/**
 * Created by stuart on 8/31/15.
 */
$(document).ready(function(){
    $('#resultsTable').DataTable({
        responsive: true,
        "paging":   false,
        "info":     false,
        "filter": false
    });

    var classes = ['brand', 'descript', 'quantity', 'colorAtr', 'sizeAtr', 'extra', 'entry',
                'time', 'msg','brand2', 'descript2', 'quantity2', 'colorAtr2', 'sizeAtr2',
                'extra2', 'entry2', 'time2', 'msg2'];
    for(var v in classes){
        var bool = false;
        $('.'+ classes[v]).each(function(index){
                if (index != 0 && $(this).text().replace(/\s+/g, '') != ""){
                    bool = true;
                }
        });
        if (!bool){
            $('.'+ classes[v]).addClass('hidden');
        }
    }
});
