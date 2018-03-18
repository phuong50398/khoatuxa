/**
 * Created by nqhuy on 12-Sep-16.
 */

$(document).ready( function() {
    // $('input[name=nambd]')[0].selectedIndex;
    // alert($('input[name=nambd]').prop('selectedIndex'));
    $('input[name=nambd]').on('change',function () {
        alert($('input[name=nambd]').prop('selectedIndex'));
    });
});