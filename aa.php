<?php

$page_title = 'kikiFarm';
?>
<?php  include ('./inc/header.inc.php'); ?>

<?php

            echo phpversion();


            require_once ('vendor/autoload.php');
            use \Statickidz\GoogleTranslate;

            $yoruba = 'yo';
            $igbo = 'ig';
            $hausa = 'ha';

            $source = 'en';
            $target = 'yo';
            $text = 'I want to buy maize';

            $trans = new GoogleTranslate();
            $result = $trans->translate($source, $target, $text);

            echo '<h2>'.$result.'</h2>';
        ?>





    <input id="text" type="hidden" value="<?php echo $result; ?>" /> <br><br>    
    <button id='btnSpeak'>Speak!</button>

    <script>


var text = document.getElementById('text').value;

btnSpeak.addEventListener('click', event => {
    event.preventDefault();

 
    const utterance = new SpeechSynthesisUtterance(text);
    const voice = speechSynthesis.getVoices().find(voice => voice.name === 'Google UK English Male');
    voice.default = false;
    utterance.voice = voice;
    window.speechSynthesis.speak(utterance);

})









    </script>




<?php  include ('./inc/footer.inc.php'); ?>