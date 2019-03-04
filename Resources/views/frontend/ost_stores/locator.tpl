
{* file to extend *}
{extends file="parent:frontend/index/index.tpl"}

{* our plugin namespace *}
{namespace name="frontend/ost-stores/locator"}



{* add our plugin to the breadcrumb *}
{block name='frontend_index_start'}

    {* smarty parent *}
    {$smarty.block.parent}

    {* our breadcrumb name *}
    {assign var="breadcrumbName" value="Filialen"}

    {* add it *}
    {$sBreadcrumb[] = ['name' => $breadcrumbName, 'link'=> ""]}

{/block}



{* remove left sidebar *}
{block name='frontend_index_content_left'}{/block}



{* main content *}
{block name='frontend_index_content'}

    {* inner content container *}
    <div class="content ost-stores--locator--content">
        <div class="block-group content--container">
            <div class="block stores--container">

                {foreach $ostStores as $store}
                    {include file="frontend/ost-stores/store.tpl" store=$store}
                {/foreach}

            </div>

            <div class="block maps--container">

                <!--
                <iframe style="width: 100%; height: 400px;" class="google-maps--frame" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1729.6958947008068!2d7.326851757490005!3d51.40457120004424!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47b9217d068ab74f%3A0x4ff18c634b4c2743!2sTrienendorfer+Str.+142%2C+58300+Wetter+(Ruhr)!5e0!3m2!1sde!2sde!4v1532186451500"  frameborder="0"  allowfullscreen></iframe>
                -->
                {literal}
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2486.2997461785408!2d7.386371415497231!3d51.452652822526005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47b9188231c3815b%3A0x47c7ca62546d35aa!2sFredi-Ostermann-Stra%C3%9Fe+1-3%2C+58454+Witten!5e0!3m2!1sde!2sde!4v1551181904007" frameborder="0" allowfullscreen></iframe>
                {/literal}

            </div>
        </div>
    </div>

{/block}
