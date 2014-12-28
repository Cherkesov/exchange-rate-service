/**
 * Created by Sergey on 26.12.2014.
 */

const GET_ALL_CURRENCIES_URL = '/app_dev.php/api/v1/currency/all';
const GET_EXCHANGE_RATE_URL = '/app_dev.php/api/v1/exchange_rate/';
const DEF_CURRENCIES_LIST = ['RUB', 'EUR', 'USD', 'UAH', 'BYR'];
const SEL_CUR_KEY = 'selected-currencies';

const DAY = 24 * 60 * 60 * 1000;
const MINUTE = 60 * 1000;
const _20_SECONDS = 20 * 1000;
var expirationTime = DAY;

var currenciesList = [];

/**
 * Load currencies list from API
 * @param callback
 */
function loadCurrenciesList(callback) {
    $.ajax({
        url: GET_ALL_CURRENCIES_URL,
        data: {},
        success: callback
    });
}

/**
 * Load exchange rate for one from-to currencies pair
 * @param from
 * @param to
 * @param successCb
 * @param errorCb
 */
function loadExchangeRate(from, to, successCb, errorCb) {
    $.ajax({
        url: GET_EXCHANGE_RATE_URL + from + to,
        data: {},
        success: successCb
    }).fail(function (jqXHR, textStatus) {
        errorCb();
    });
}

/**
 * Show data about exchange rate as text in specified jquery-element
 * @param from
 * @param to
 * @param $element
 * @param clearCache
 */
function outputExRate(from, to, $element, clearCache) {
    var rate = $.jStorage.get(from + to);
    if (!clearCache && rate != undefined) {
        console.log('Load LOCAL');
        $element.text(rate);
    } else {
        console.log('Load REMOTE');
        loadExchangeRate(from, to, function (data) {
            var rate = parseFloat(data.rate).toFixed(4);
            $element.text(rate);
            $.jStorage.set(from + to, rate, {TTL: expirationTime});
        }, function (err) {
            $element.text(0);
            $.jStorage.set(from + to, 0);
        });
    }
}

/**
 * Remove data about exchange rates
 */
function flushExRatesData() {
    for (var r = 0; r < currenciesList.length; r++) {
        for (var c = 0; c < currenciesList.length; c++) {
            if (r == c) continue;
            var key = currenciesList[r].code + currenciesList[c].code;
            $.jStorage.deleteKey(key);
        }
    }
}

/**
 * Get selected currencies list
 * @returns {Array}
 */
function getSelectedCurrencies() {
    return ($.jStorage.get(SEL_CUR_KEY) != null)
        ? $.jStorage.get(SEL_CUR_KEY).split(',')
        : DEF_CURRENCIES_LIST;
}

/**
 * Set selected currencies list
 * @param arr
 */
function setSelectedCurrencies(arr) {
    $.jStorage.set(SEL_CUR_KEY, arr.join(','));
}

/**
 * Show 2d views (table) about exchange rates
 * @param availableTagsArr
 */
function drawTable(availableTagsArr) {
    var $table = $('#er_table');
    var $head = $table.find('thead');
    var $body = $table.find('tbody');

    $table.find('th, td').remove();

    $head.append($('<th></th>').text('--/--'));
    for (var r = 0; r < availableTagsArr.length; r++) {
        $head.append($('<th></th>').text(availableTagsArr[r]));

        var $tr = $('<tr></td>');
        $tr.append($('<td></td>').text(availableTagsArr[r]));
        for (var c = 0; c < availableTagsArr.length; c++) {
            var $td = $('<td></td>').html('&nbsp;');
            $td.data('from', (r != c) ? availableTagsArr[r] : '');
            $td.data('to', (r != c) ? availableTagsArr[c] : '');
            $tr.append($td);
        }
        $body.append($tr);
    }

    $table.find('td').each(function () {
        var $cell = $(this);
        var from = $cell.data('from');
        var to = $cell.data('to');

        if (!from || from == undefined || !to || to == undefined)
            return true;

        outputExRate(from, to, $cell);
    });
}

/**
 * Get only currencies codes (without other data)
 * @returns {Array}
 */
function getCurrenciesCodesArr(){
    var codes = [];
    for (var i = 0; i < currenciesList.length; i++) {
        codes.push(currenciesList[i].code);
    }
    return codes;
}

/**
 * Init select currencies tags input
 * @param currencies
 */
function initCurrenciesInput(currencies) {
    var $currenciesInput = $('#currencies');
    var selectedCurrencies = getSelectedCurrencies();
    for (var j = 0; j < selectedCurrencies.length; j++) {
        var $li = $('<li></li>').text(selectedCurrencies[j]);
        $currenciesInput.append($li);
    }
    $currenciesInput.tagit({
        availableTags: getCurrenciesCodesArr(),
        showAutocompleteOnFocus: true,
        afterTagAdded: function (event, ui) {
            setSelectedCurrencies($(this).tagit('assignedTags'));
            drawTable($(this).tagit('assignedTags'));
        },
        afterTagRemoved: function (event, ui) {
            setSelectedCurrencies($(this).tagit('assignedTags'));
            drawTable($(this).tagit('assignedTags'));
        }
    });
}

/**
 * Reload exchange rates data and reload page
 */
function reloadData() {
    flushExRatesData();
    document.location.reload();
}

/**
 * Entry point
 */
$(function () {
    loadCurrenciesList(function (data) {
        currenciesList = data;
        initCurrenciesInput(currenciesList);

        $('#er_cache_update').click(function(e){
            e.preventDefault();
            reloadData();
        });
        setTimeout(reloadData, expirationTime);
    });
});