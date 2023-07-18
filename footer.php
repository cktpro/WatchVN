<div class="footer">
    <!-- <div class="left_footer"> <img src="images/footer_logo.png" alt="" width="170" height="49"/> </div> -->
    <div class="left_footer"><div align=center>This template  downloaded form <a href='http://all-free-download.com/free-website-templates/'>free website templates</a></div></body></div>
    <div class="right_footer"> <a href="http://localhost/watch/">home</a> <a href="">about</a> <a href="">sitemap</a> <a href="">rss</a> <a href="contact.html">contact us</a> </div>
    <div class="center_footer"> Template name. All Rights Reserved 2008<br />
      <a href="http://csscreme.com"><img src="images/csscreme.jpg" alt="csscreme" border="0" /></a><br />
      <img src="images/payment.gif" alt="" /> </div>
    <!-- <div class="right_footer"> <a href="http://localhost/watch/">home</a> <a href="">about</a> <a href="">sitemap</a> <a href="">rss</a> <a href="contact.html">contact us</a> </div> -->
</div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<style>
    #cfacebook{
        position: fixed; 
        bottom: 0px;
        right: 8px;
        z-index: 999999999999999;
        width: 250px; height: auto;
        box-shadow: 6px 6px 6px 10px rgba(0,0,0,0.2);
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        overflow: hidden;
    }
    #cfacebook .fchat{float: left; width: 100%; height: 295px; overflow: hidden; display: none; background-color: #fff;}
    #cfacebook .fchat .chat-single{float: left; line-height: 25px; line-height: 25px; color: #333; width: 100%;}
    #cfacebook .fchat .chat-single a{float: right; text-decoration: none; margin-right: 10px; color: #888; font-size: 12px;}
    #cfacebook .fchat .chat-single a:hover{color: #222;}
 
    #cfacebook .fchat .fb-page{margin-top: -130px; float: left;}
    #cfacebook a.chat_fb{
        float: left;
        padding: 0 25px;
        width: 250px;
        color: #fff;
        text-decoration: none;
        height: 40px;
        line-height: 40px;
        text-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);        
    
        background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAAqCAMAAABFoMFOAAAAWlBMV…8/UxBxQDQuFwlpqgBZBq6+P+unVY1GnDgwqbD2zGz5e1lBdwvGGPE6OgAAAABJRU5ErkJggg==);
        background-repeat: repeat-x;
        background-size: auto;
        background-position: 0 0;
        background-color: #0065BF;
        border: 0;
        border-bottom: 1px solid #0065BF;
        z-index: 9999999;
        margin-right: 12px; font-size: 18px;}
   #cfacebook a.chat_fb:hover{color: yellow; text-decoration: none;}
</style>
<script>
    function fchat()
    {
            var tchat= document.getElementById("tchat").value;
            if(tchat==0 || tchat=='0')
            {                
                document.getElementById("fchat").style.display = "block";
                document.getElementById("tchat").value=1;
            }else{
                document.getElementById("fchat").style.display = "none";
                document.getElementById("tchat").value=0;
            }             
    }
    setTimeout(function() {document.getElementById("fchat").style.display = "block";}, 99999999999);
</script>
 
<div id="cfacebook">
    <a href="javascript:;" class="chat_fb" onclick="javascript:fchat();"><i class="fa fa-comments"></i> Hỗ trợ trực tuyến</a>
    <div id="fchat" class="fchat">
        <div class="fb-page" data-tabs="messages" data-href="https://www.facebook.com/donghorox/" data-width="250" data-height="400" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"></div>
        <div class="chat-single"><a target="_blank" href="https://www.facebook.com/cktprox"><i class="fa fa-facebook-square"></i> cktpro </a></div>
    </div>
    <input type="hidden" id="tchat" value="0"/>
</div>