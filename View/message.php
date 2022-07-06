<?php require "template/header.php";
require "../Libraries/Message.php";
$messageObject = new Message;
if(isset($_GET['with'])) $messages = $messageObject->getAllMsg($_SESSION['email'],$_GET['with']);
$list = $messageObject->getContacts($_SESSION['email']);

?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">


<div class="container">
	<h3 class=" text-center">Messages</h3>
	<div class="messaging">
      <div class="inbox_msg">
        <div class="inbox_people">
          <div class="headind_srch">
            <div class="recent_heading">
              <h4>Récent</h4>
            </div>
            <div class="srch_bar">
              <div class="stylish-input-group">
                <input type="text" class="search-bar"  placeholder="Rechercher" >
                <span class="input-group-addon">
                <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                </span> </div>
            </div>
          </div>
          <div class="inbox_chat">
            <?php 
            if(!empty($list)){
                    foreach($list as $lst){
                    print '<div class="chat_list ">
                              <div class="chat_people">
                                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                <div class="chat_ib">
                                <a href="message.php?with='.$lst->responder.'"> <h5>'.$lst->responder.'</h5> </a>
                                </div>
                              </div>
                            </div>';
            
            }
            } ?>
          </div>
        </div>
        <?php if(isset($_GET['with'])){ ?>
  <div class="type_msg">
  <div class="mesgs">
          <div class="msg_history" id="history">
            <?php if(!empty($messages)){
              foreach($messages as $msg){
              if($msg->email_from == $_SESSION['email']){
                print'<div class="outgoing_msg">
                                <div class="sent_msg">
                                    <p>'.$msg->message.'</p>
                                </div>
                                </div>';
              }else{
                print'<div class="received_msg">
                                <div class="received_withd_msg">
                                    <p>'.$msg->message.'</p>
                                    </div>
                                    </div>';
              }
            } }?>
            
          </div>
          <div class="type_msg">
            <div class="input_msg_write">
              <input type="text" value="<?php echo $_SESSION['email']; ?>" id="from_email" hidden>
              <input type="text" value="<?php echo $_GET['with']; ?>" id="to_email" hidden>
              <input type="text" class="write_msg" placeholder="Type a message" id="msgOmar"/>
              <button class="msg_send_btn" type="button" id="send"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
            </div>
          </div>
        </div>
        <?php } ?>
        </div>
      </div>
    </div>
</div>
<!-- <?php ?> -->
<script>
    const sendMessage = document.getElementById("send");
    
    sendMessage.addEventListener("click",(e)=>{
      const msg = document.getElementById("msgOmar").value;
      const from = document.getElementById("from_email").value;
      const to = document.getElementById("to_email").value;
      const history = document.getElementById("history");
           const xhr = new XMLHttpRequest();


            xhr.open("GET","../Libraries/Message.php?message="+msg+"&from="+from+"&to="+to,true);
            xhr.onload = function(){
                console.log(this.responseText);
                history.innerHTML += this.responseText;
            }
            xhr.send();
            
    })

    setInterval(function(){
            const history = document.getElementById("history");
            const xhr = new XMLHttpRequest();

            xhr.onload = function(){
              history.innerHTML += this.responseText;
            }

            xhr.open("GET","../Libraries/Message.php?receive=<?php echo $_SESSION['email']; ?>"+"&to=<?php echo $_GET['with']; ?>",true);
            xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded")
            xhr.send();
        },5000)


</script>

<?php require "template/footer.php"; ?>