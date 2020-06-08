<script>
    chin =$('.chat-inner');
    chin.css('display',"none");
    hin=$('.chat-side .headerchat button.close-chat');
    chsi=$('.chat-side');
    chsi.css('display',"none");
    function shownavchat(){
        chsi.css('display','block');
    }
    function showchatcontent(){
        chin.css('display','block');
        hin.addClass("chatop");
    }
    hin.click(function(){
        if ($(this).hasClass("chatop")){
            chin.css("display","none");
            $(this).removeClass("chatop");
        }else{
            chsi.css('display',"none");
        }
    });
</script>