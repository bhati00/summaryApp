$(document).ready(function() {
    debugger;
    var k = main_url;
    var xin_table = $('#all_files_table').dataTable({
        "bDestroy": true,
        "ajax": {
            url: main_url + "/files-list",                    
            type: 'GET'
        }                
    });
});