
<script type="text/javascript">
	@if(isset($registration->status) &&  $registration->status == 'Registered')
	$('input,select,textarea').not(".unique_id, input[name='_token'],input[name='url']").prop('readonly', true).prop('disabled',true);
	@endif



    $(document).on('click', '.selecturl', function (e) {
        e.preventDefault();
        var url = $(this).attr('data-href');
        previouspage(url);
    });
    function previouspage(url) {
        $('input[name="url"]').val(url);
        $('.pref-form').submit();
    }

</script>

