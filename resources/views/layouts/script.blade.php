<script type="text/javascript">
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
