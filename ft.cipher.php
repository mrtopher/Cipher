<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cipher_ft extends EE_Fieldtype 
{
	public $EE;
	public $info = array(
		'name'		=> 'Cipher',
		'version'	=> '1.0'
		);
	
	/**
	 * Constructor
	 */
	public function __construct()
	{
		parent::__construct();

        $this->EE->load->library('encrypt');
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * Install Fieldtype
	 *
	 * @access	public
	 * @return	array
	 *
	 */
	public function install()
	{
		$this->EE->load->helper('string');
	
		return array(
			'field_key' => random_string('alnum', 20)
			);
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * Display Field Settings on Fieldtype Page
	 *
	 * @access	public
	 * @return	field html
	 *
	 */
	public function display_settings()
	{
		$this->EE->table->add_row('Encryption Key', form_input('encryption_key', $this->settings['field_key']));
	}
	
	// --------------------------------------------------------------------

	/**
	 * Save Field Settings
	 *
	 * @access	public
	 * @return	array
	 *
	 */
	public function save_settings()
	{
		return array(
			'field_key' => $this->EE->input->post('encryption_key')
			);
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * Display Field on Publish
	 *
	 * @access	public
	 * @param	existing data
	 * @return	field html
	 *
	 */
	public function display_field($data)
	{		
		return form_input($this->field_name, $this->EE->encrypt->decode($data, $this->settings['field_key']), 'id="' . $this->field_id . '"');
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * Save Field Data to DB
	 *
	 * @access	public
	 * @param	entered data
	 * @return	string
	 *
	 */
	public function save($data)
	{
		return $this->EE->encrypt->encode($data, $this->settings['field_key']);
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * Replace tag
	 *
	 * @access	public
	 * @param	field contents
	 * @return	replacement text
	 *
	 */
	public function replace_tag($data, $params = array(), $tagdata = FALSE)
	{
		return $this->EE->encrypt->decode($data, $this->settings['field_key']);
	}	
}

/* End of file ft.cipher.php */
/* Location: ./system/expressionengine/third_party/cipher/ft.cipher.php */