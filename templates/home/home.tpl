{$modules.head}
<div id="content">
    <h1>Successful instalation of boiras!</h1>

    <p><img src="{$url.global}imag/accept.gif">Example of model result:</p>
    <ul>
    {        foreach from=$content_documents_smarty_variable item=document}
        <li>{$document.content}</li>
    {		/foreach}
    </ul>

{    if isset($sended_variable)}
    <p>The form has been sended and the variable value is: {$sended_variable}</p>
{	/if}

    <h2>Send a message with this form:</h2>

    <form action="" method="post">
        <input type="text" name="test" id="test"/>
        <input type="submit" name="submit" id="submit" value="Send"/>
    </form>
</div>
{$modules.footer}