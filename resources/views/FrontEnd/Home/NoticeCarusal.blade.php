<section class="notice-carusal">
    <div id="example-1">
    </div>
</section>
<script>
/* function Notice() {
    $.ajax({
        type: 'get',
        url: "{{ route('homestate.getNoticelist') }}",
        dataType: "JSON",
        success: function(data) {
            console.log(data);
               $(".notice-carusal-list").empty();
               data.forEach(function(value) {
                   $(".notice-carusal-list").append('<a href="#">' + value.title + '</a>');
               });
        },
        error: function(data) {
            console.log(data);
        }
    });
}
window.onload = Notice(); */
$('#example-1').eocjsNewsticker({
    speed: 25,
    type: 'ajax',
    source: "{{ route('homestate.getNoticelist') }}",
    divider: '-',
    timeout: 1,


});
</script>