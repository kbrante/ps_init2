<!-- Block ah -->
<div id="ah_block_left" class="block">
  <h4>{l s='Welcome!' mod='ah'}</h4>
  <div class="block_content">
    <p>
      {if !isset($ah) || !$ah}
        {capture name='my_module_tempvar'}{l s='World' mod='ah'}{/capture}
        {assign var='ah' value=$smarty.capture.my_module_tempvar}
      {/if}
      {l s='Hello %1$s!' sprintf=$ah mod='ah'}
    </p>
    <ul>
      <li><a href="{$my_module_link}"  title="{l s='Click this link' mod='ah'}">{l s='Click me!' mod='ah'}</a></li>
    </ul>
  </div>
</div>
<!-- /Block ah -->
