		<p>Welcome, {sUserName}</p>

		<p>If you would like to edit this page you'll find it located at:</p>
		<code>application/views/welcome_message.php</code>

		<p>The corresponding controller for this page is found at:</p>
		<code>application/controllers/welcome.php</code>

		<p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="user_guide/">User Guide</a>.</p>

			
		<hr/>

		{if 10 > 8}10 is greater then 8<br />{/if}
		{if "test"==test}Test is equal to test<br />{/if}
		{if test!=asdfsd}Test is not equal to asdfsd<br />{/if}
		{if test}Test is set<br />{/if}
		{if randomjunk}This should never show<br />{else}This should always show{/if}

		<hr />

		{blog_entries}
			{title}
			{body}
			<hr />
		{/blog_entries}

		{sForm}