    <link rel="stylesheet" href="/wp-content/plugins/wp-ratefy/public/html/stylesheet.css">

    <div class="review-box">

    <div class="review-text">
      <form action="<?=plugins_url()?>/wp-ratefy/public/form-processor.php" method="POST" id="form-review">
        <p><input type="text" name="_reviewer-name" id="reviewer-name" placeholder="Your Name"></p>
        <p><input type="text" name="_reviewer-email" id="reviewer-email" placeholder="Your Email"></p>
        <p><textarea rows="4" cols="50" id="reviewer-comment" name="_reviewer-comment" placeholder="Any comments about our service?"></textarea></p>

        </div>

        <div class="stars-box">
          <p>Please rate our service:</p>
          <span class="starRating">
            <input id="rating5" type="radio" name="_reviewer-rating" value="5">
            <label for="rating5">5</label>
            <input id="rating4" type="radio" name="_reviewer-rating" value="4">
            <label for="rating4">4</label>
            <input id="rating3" type="radio" name="_reviewer-rating" value="3">
            <label for="rating3">3</label>
            <input id="rating2" type="radio" name="_reviewer-rating" value="2">
            <label for="rating2">2</label>
            <input id="rating1" type="radio" name="_reviewer-rating" value="1">
            <label for="rating1">1</label>
          </span>
        </div>      

        <input type="hidden" value="<?php echo get_the_ID(); ?>" name="_reviewer-postid">
        <?php 
          wp_nonce_field( 'review-item' );
        ?>

        <div class="button-wrapper">
          <button class="button-rate" id="button-trigger" href="">Send Me</button>
        </div>
      </form>
    </div>

  </body>

<script src="//code.jquery.com/jquery-1.12.1.min.js"></script>


<script type="text/javascript">

var $j = jQuery.noConflict();

$j(document).ready(function() {

  var rate;
  var message;

  $j("input[name=_reviewer-rating]").change(function () {   
    rate = $j(this).val();
  });

  $j( "#button-trigger" ).click(function() {

    if( !$j("#reviewer-name").val()  ) {
      $j("#reviewer-name").after('<p class="warning">You need to tell us, your name!</p>');
      return false;
    }

    if( !$j("#reviewer-email").val()  ) {
      $j("#reviewer-email").after('<p class="warning">You need to tell us, your email!</p>');
      return false;
    }

    if( !$j("#reviewer-comment").val()  ) {
      $j("#reviewer-comment").after('<p class="warning">You need to tell us, any comment about our service!</p>');
      return false;
    }

    if( !rate ) {
      $j(".stars-box").after('<p class="warning">You need to give us a rate about our service!</p>');
      return false;      
    }

    $("#form-review").submit();

  });

});

</script>