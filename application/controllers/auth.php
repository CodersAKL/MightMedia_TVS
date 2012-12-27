<?php if ( !defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}

/**
 * MightMedia TVS
 * User: FDisk
 * Date: 12/28/12
 * Time: 12:21 AM
 * © 2012
 *
 * @property OAuth2 $oauth2
 */
class Auth extends MY_Controller
{
	public function session($provider)
	{
		$this->load->helper('url_helper');

		$this->load->library('oauth2');
		$this->load->config('auth', true);
		$aToken = $this->config->item( $provider, 'auth' );

		if ( empty( $aToken ) ) {
			show_404();
		}
		$provider = $this->oauth2->provider(
			$provider,
			array(
				'id'     => $aToken['id'],
				'secret' => $aToken['secret']
			)
		);

		if ( ! $this->input->get('code'))
		{
			// By sending no options it'll come back here
			$provider->authorize();
		}
		else
		{
			// Howzit?
			try
			{
				$token = $provider->access($_GET['code']);

				$user = $provider->get_user_info($token);

				// Here you should use this information to A) look for a user B) help a new user sign up with existing data.
				// If you store it all in a cookie and redirect to a registration page this is crazy-simple.
				echo "<pre>Tokens: ";
				var_dump($token);

				echo "\n\nUser Info: ";
				var_dump($user);
			}

			catch (OAuth2_Exception $e)
			{
				show_error('That didnt work: '.$e);
			}

		}
	}
}

/* End of file welcome.php */
/* Location: ./controllers/auth.php */