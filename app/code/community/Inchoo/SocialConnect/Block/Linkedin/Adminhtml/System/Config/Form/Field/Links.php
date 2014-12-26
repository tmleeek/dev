<?php

class Inchoo_SocialConnect_Block_Linkedin_Adminhtml_System_Config_Form_Field_Links
    extends Inchoo_SocialConnect_Block_Adminhtml_System_Config_Form_Field_Links
{

    protected function getAuthProviderLink()
    {
        return 'LinkedIn Developer Network';
    }

    protected function getAuthProviderLinkHref()
    {
        return 'https://developer.linkedin.com/';
    }
    
}