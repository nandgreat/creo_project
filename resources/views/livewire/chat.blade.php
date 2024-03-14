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
    }
    .chat-message {
    background-color: #05204A;
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 10px;
    }
.chat-left{
    text-align: left;
}
.chat-right{
    text-align: right;
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
    </style>
    <section class='text-center m-5'>
        <h2 class='text-customprimary'><a href='/chat'><img src='{{asset("asset/svg/chart.svg")}}' width='50'></a> LET US CHAT </h2>
    </section>
    <section class='chat-area m-5'>
    <div class="chat-container">
        <div class="chat-messages">
            <div class="chat" wire:poll.1000ms="onInterval">
                @if($name == null)
                <div class="message receiver">
                  <p>Hi, Whats your name?</p>
                </div>
                @elseif($name != null && $email ==null)
                <div class="message receiver">
                    <p>Hi, Whats your name?</p>
                  </div>
                  <div class="message sender">
                    <p>{{$name}}</p>
                  </div>
                <div class="message receiver">
                    <p>Your Email?</p>
                  </div>

                @elseif($name != null && $email != null && $selectedTopic == null)
                <div class="message receiver">
                    <p>Hi, Whats your name?</p>
                  </div>
                  <div class="message sender">
                    <p>{{$name}}</p>
                  </div>
                <div class="message receiver">
                    <p>Your Email?</p>
                  </div>
                  <div class="message sender">
                    <p>{{$email}}</p>
                  </div>
                  <div class="message receiver">
                    <p>Select Topic?</p>
                    <ol>
                        @foreach ($storyContent as $storyContentData)
                                <li>{{$storyContentData->title}}</li>
                        @endforeach
                    </ol>

                  </div>

                  @if ($chatMessages)
                  @foreach ($chatMessages as $chatMessagesData)
                  @if ($chatMessagesData->target_email != null)
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
                @else
                  <div class="message receiver">
                    <p>Hi, Whats your name?</p>
                  </div>
                  <div class="message sender">
                    <p>{{$name}}</p>
                  </div>
                <div class="message receiver">
                    <p>Your Email?</p>
                  </div>
                  <div class="message sender">
                    <p>{{$email}}</p>
                  </div>
                  <div class="message receiver">
                    <p>Select Topic?</p>
                    <ol>
                        @foreach ($storyContent as $storyContentData)
                                <li>{{$storyContentData->title}}</li>
                        @endforeach
                    </ol>
                  </div>
                @endif
                @if ($errorMessage)
                <div class="message receiver">
                  <p>{{$errorMessage}}</p>
                </div>
                @endif
                @if ($chatMessages)
                    @foreach ($chatMessages as $chatMessagesData)
                    @if ($chatMessagesData->target_email == $email)
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

 <section class='m-5 row text-center'>
    @guest()
    <label class='col-sm-6 col-md-4'><a href='/register'><input type='radio' class='m-2' name='select'>Click to Register</a></label>
    <label class='col-sm-6 col-md-4'><input type='radio' class='m-2' name='select'>Click to Cancel</label>
    @endguest

 </section>
 @livewireScripts
 <script>
    $('.chat-form').on('submit', function(e) {
  e.preventDefault();

  var message = $('.chat-input').val();
  $('.chat-messages').append('<div class="chat-right chat-message">' + message + '</div>');
  $('.chat-input').val('');
});

 </script>
</div>
