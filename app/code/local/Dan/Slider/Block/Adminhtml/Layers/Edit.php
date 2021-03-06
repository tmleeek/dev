<?php

class Dan_Slider_Block_Adminhtml_Layers_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'slider';
        $this->_controller = 'adminhtml_layers';
        
        $this->_updateButton('save', 'label', Mage::helper('slider')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('slider')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('layers_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'layers_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'layers_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('layers_data') && Mage::registry('layers_data')->getId() ) {
            return Mage::helper('slider')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('layers_data')->getCaptionName()));
        } else {
            return Mage::helper('slider')->__('Add Item');
        }
    }
}