$(document).on('click', '#accordeon-conf', function () {
    //var x = document.getElementById(id);
    if ($('#Demo1').attr('class') !== 'w3-accordion-content w3-show') {
        $('#Demo1').attr('class', 'w3-accordion-content w3-show');
        $('.w3-accordion').attr('class', 'w3-accordion w3-light-grey')
    } else { 
        $('#Demo1').attr('class', 'w3-accordion-content');
        $('.w3-accordion').attr('class', 'w3-accordion')        
    }
});