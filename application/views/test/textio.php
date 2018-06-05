<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
    <title>Welcome to Textbox.io</title>
    <script type='text/javascript' src='<?=base_url("assets/textboxio/textboxio.js"); ?>'></script>
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/textio.css');?>" />

    <script>
      /*
      This function replaces all <textareas> on a page with
      instances of Textbox.io.
      */
      var instantiateTextbox = function () {
        textboxio.replaceAll('textarea', {
          paste: {
            style: 'clean'
          },
          css: {
            stylesheets: ['example.css']
          }
        });
      };

    </script>
    <script>
      /*
      This function gets the content from the instance of Textbox.io
      with the ID 'textbox'
      */
      var getEditorContent = function(){
          var editors = textboxio.get('#textbox');
          var editor = editors[0];
          return editor.content.get();
      };
    </script>
  </head>

  <body onload="instantiateTextbox();">
    <div style="width:50%; margin:auto">
        <h1>Welcome to Textbox.io</h1>
        <p>You have successfully installed the Textbox.io SDK.</p>
        <p>Textbox.io is a next generation rich text editor that provides users with the best possible authoring experience for desktop and mobile browsers.  It's implemented in JavaScript using HTML5 and CSS3 technologies to provide the best in-browser experience and a completely responsive UI.</p>
        <form method="POST">
        	<textarea id="textbox"  name="io" style="width: 100%; height: 400px;">
	            <h2>This is Textbox.io</h2>
	            <p>Welcome to the next generation of rich text editing on the web.</p>
	        </textarea>
	        <button type="submit">Save</button>
        </form>
        
        <p align="center"><button onclick="javascript:alert(getEditorContent());">Get Content</button></p>
        <p>You can now create editor instances by replacing &lt;textarea&gt; or &lt;div&gt; elements with the <a href="http://docs.ephox.com/display/tbio/replace">textboxio.replace() API</a>. When Textbox.io replaces a &lt;textarea&gt; element within a &lt;form&gt;, it mimics the behavior of the original &lt;textarea&gt; element when the form is submitted, supplying content as part of the &lt;form&gt; POST.</p>
        <p>Visit the  <a href="http://docs.ephox.com/display/tbio/API+Basics">API Basics</a> guide to learn how to tailor the editor to your application's needs.</p>
    </div>
    <?php foreach($texts as $text ): ?>
    	<div>
    		<hr/>
    		<p><?=$text['date_created'];?></p>
    		<?=$text['value'];?>
		</div>
	<?php endforeach; ?>
  </body>
</html>
