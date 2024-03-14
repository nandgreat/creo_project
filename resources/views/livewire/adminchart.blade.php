<div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
    .chat-container {
    display: flex;
    flex-direction: column;
    height: 100%;
    }

    .chat-messages {
    flex: 1;
    overflow-y: scroll;
    }
    .chat-message {
    background-color: #05204A;
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 10px;
    text-align: right; /* align text to the right */
    }

.chat-form {
  display: flex;
  margin-top: 10px;
}

.chat-input {
  flex: 1;
  padding: 10px;
  font-size: 16px;
}

.chat-send {
  padding: 10px;
  font-size: 16px;
  background-color: #007bff;
  color: #fff;
  border: none;
  cursor: pointer;
}
.sidebar{
  background-color: #05204A;
  color:#fff;

}
ul{
    list-style-type: none ;
}
.chatUser{
    padding:5px;
}
li.chatUser{
    display:flex;
}
.avatar {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  overflow: hidden;
}

.avatar img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}
.nameText{
    margin-left:1.2rem;
}
    </style>
     <style>
        .message {
  margin-bottom: 10px;
  padding: 10px;
  border-radius: 5px;
  /* Common styles for both sender and receiver messages */
}

.sender {
  background-color: lightblue;
  /* Styles specific to sender messages */
}

.receiver {
  background-color: lightgreen;
  /* Styles specific to receiver messages */
}
.chat,.chat-messages{
    overflow-y: scroll;
}
li:active,
li:focus {
  background-color: yellow;
}
    </style>
    <section class='text-center '>
        <h2 class='text-customprimary'><a href='/chat'><img src='{{asset("asset/svg/chart.svg")}}' width='50'></a> LET US CHAT </h2>
    </section>
 <section class='row'>
<div class='col-sm-6 col-md-4'>
    <div class='sidebar'>
        <ul>

            @if ($users)
                @foreach ($users as $userdata)
                    <li class='chatUser' >

                        <div class="avatar">
                            <a wire:click="selectUser('{{$userdata->email}}')"><img src="{{asset("asset/svg/user.svg")}}" alt="Avatar" /></a>
                        </div>
                        <div class='nameText'><a wire:click="selectUser('{{$userdata->email}}')">{{$userdata->email}}</a></div>
                    </li>
                @endforeach
            @endif

        </ul>
    </div>
</div>
    <div class='col-sm-6 col-md-8'>
    <section class='chat-area'>
    <div class="chat-container">
        <div class="chat-messages">
            <div class="chat" wire:poll.2000ms="onInterval">
                @if ($chatMessages)
                @foreach ($chatMessages as $chatMessagesData)
                @if ($chatMessagesData->target_email == null)
                <div class="message receiver">
                    <p>{{$chatMessagesData->message}}</p>
                    <small>{{$chatMessagesData->name}}</small>
                </div>
                @else
                <div class="message sender">
                    <p>{{$chatMessagesData->message}}</p>
                </div>
                @endif
                @endforeach
                @endif
            </div>
        </div>
        <form class="chat-form">
            <input type="text" wire:model='message' class="chat-input" placeholder="Type your message here...">
            <button type="submit" class="chat-send" wire:click.prevent='send'>Send</button>
        </form>
      </div>
    </section>
</div>
 </section>
 <script>
    $('.chat-form').on('submit', function(e) {
  e.preventDefault();

  var message = $('.chat-input').val();
  $('.chat-messages').append('<div class="chat-message">...</div>');
  $('.chat-input').val('');
});

 </script>
</div>
