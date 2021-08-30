<script type="text/javascript">
    let closed = true;
    $(".opener").click(function (){
        if (closed){
            $(".menxzz").slideDown('fast').focus();
            closed = false;
        }
    });
    $(".menxzz").blur(function (){
        setTimeout(function (){
            $(".menxzz").slideUp('fast');
            closed = true;
        },500);
    });
    $(".showmenu").click(function (){
        $(".mainpg").toggleClass("active");
    });
</script>
