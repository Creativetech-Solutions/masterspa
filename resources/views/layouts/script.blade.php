<script type="text/javascript">
    $(document).on('click', '.selecturl', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        var result = url.substring(url.lastIndexOf("/") + 1);
        previouspage(result);
    });
    function previouspage(url) {
        $('input[name="url"]').val(url);
        $('.pref-form').submit();
    }
</script>
