<?php
class EditArticle extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 * @access public
 */
	public $description = '';

/**
 * Actions to be performed
 *
 * @var array $migration
 * @access public
 */
	public $migration = array(
		'up' => array(
			'create_table' => array(
				'accounts' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
					'user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
					'game_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
					'account_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
					'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL, 'key' => 'index'),
					'modified' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
					'fb_id' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45, 'key' => 'index', 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
					'id_game_center' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
					'email_google_play' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
						'user_id_game_id' => array('column' => array('user_id', 'game_id'), 'unique' => 1),
						'user_id' => array('column' => 'user_id', 'unique' => 0),
						'game_id' => array('column' => 'game_id', 'unique' => 0),
						'game_id_fb_id' => array('column' => array('game_id', 'fb_id'), 'unique' => 0),
						'created' => array('column' => 'created', 'unique' => 0),
						'account_id_game_id' => array('column' => array('account_id', 'game_id'), 'unique' => 0),
						'fb_id' => array('column' => 'fb_id', 'unique' => 0),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB'),
				),
				'articles' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
					'title' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 1000, 'key' => 'index', 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
					'body' => array('type' => 'text', 'null' => false, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
					'parsed_body' => array('type' => 'text', 'null' => false, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
					'summary' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
					'user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
					'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL, 'key' => 'index'),
					'modified' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
					'position' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
					'category_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index'),
					'type_of_category' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'comment' => 'Ki?u bài vi?t ph? cho t?ng chuyên m?c'),
					'slug' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 1000, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
					'published' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
					'published_date' => array('type' => 'datetime', 'null' => true, 'default' => NULL, 'key' => 'index'),
					'is_hot' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
					'website_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
					'event_start' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
					'event_end' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
					'key_words' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
					'view' => array('type' => 'integer', 'null' => true, 'default' => NULL),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
						'position' => array('column' => 'position', 'unique' => 0),
						'user_id' => array('column' => 'user_id', 'unique' => 0),
						'category_id' => array('column' => 'category_id', 'unique' => 0),
						'title' => array('column' => 'title', 'unique' => 0, 'length' => array('255')),
						'created' => array('column' => 'created', 'unique' => 0),
						'published_date' => array('column' => 'published_date', 'unique' => 0),
						'website_id_published_event_start_event_end' => array('column' => array('website_id', 'published', 'event_start', 'event_end'), 'unique' => 0),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB'),
				),
				'categories' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
					'title' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'slug' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'published' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
					'menu_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
					'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
					'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
					'description' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB'),
				),
				'email_marketings' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
					'title' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'body' => array('type' => 'text', 'null' => false, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'parsed_body' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
					'modified' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
					'published_date' => array('type' => 'datetime', 'null' => false, 'default' => NULL, 'key' => 'index'),
					'user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
					'game_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
					'layout' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'file' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'big5_chinese_ci', 'charset' => 'big5'),
					'status' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 2),
					'data' => array('type' => 'text', 'null' => false, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
					'type' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 2),
					'total' => array('type' => 'integer', 'null' => false, 'default' => '0'),
					'from_time' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
					'to_time' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
					'field' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'view' => array('type' => 'integer', 'null' => true, 'default' => NULL),
					'click' => array('type' => 'integer', 'null' => true, 'default' => NULL),
					'ad_for_game_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
					'relating_users_on_email_marketing_ids' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
						'published_date_status' => array('column' => array('published_date', 'status'), 'unique' => 0),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
				),
				'images' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
					'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'key' => 'unique', 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
					'foreign_key' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
					'model' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 45, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
					'type' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 45, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
					'width' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
					'height' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
					'size' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
					'size_correct' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
					'size_optimize' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
					'origin_name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
					'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
					'user_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
					'deleted' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
					'deleted_date' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
					'resized' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
					'url' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 1000, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
					'position' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 6),
					'description' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
					'data' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
						'image_name' => array('column' => 'name', 'unique' => 1),
						'foreign_key_model_type' => array('column' => array('foreign_key', 'model', 'type'), 'unique' => 0),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB'),
				),
				'media' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
					'title' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
					'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
					'modified' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
					'website_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
					'description' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
					'position' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
					'type' => array('type' => 'string', 'null' => false, 'default' => 'N', 'length' => 45, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
					'slug' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
					'item' => array('type' => 'string', 'null' => false, 'default' => 'Image', 'length' => 45, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
					'video_count' => array('type' => 'integer', 'null' => true, 'default' => '0'),
					'image_count' => array('type' => 'integer', 'null' => true, 'default' => '0'),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB'),
				),
				'menus' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
					'title' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'slug' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
					'published' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4),
					'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
					'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
					'description' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB'),
				),
				'users' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
					'username' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
					'name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
					'slug' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
					'password' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 128, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
					'password_token' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 128, 'key' => 'index', 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
					'email' => array('type' => 'string', 'null' => true, 'default' => NULL, 'key' => 'index', 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
					'email_verified' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
					'email_temp_verified' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 3),
					'email_token' => array('type' => 'string', 'null' => true, 'default' => NULL, 'key' => 'index', 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
					'email_token_expires' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
					'tos' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
					'active' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
					'last_login' => array('type' => 'datetime', 'null' => true, 'default' => NULL, 'key' => 'index'),
					'last_action' => array('type' => 'datetime', 'null' => true, 'default' => NULL, 'key' => 'index'),
					'role' => array('type' => 'string', 'null' => false, 'default' => 'User', 'key' => 'index', 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
					'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL, 'key' => 'index'),
					'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
					'facebook_uid' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'key' => 'index', 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
					'device_id' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'key' => 'index', 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
					'updated' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
					'mobpoint_total' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
					'funpoint_total' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
					'fb_verified' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
					'description' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
					'country_code' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 45, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
					'count_daily' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 10),
					'vip' => array('type' => 'string', 'null' => false, 'default' => '0', 'length' => 100, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
					'id_game_center' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
					'email_google_play' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
					'ads_enter' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 6),
					'ads_time_used' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
					'username_token' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
					'username_token_expries' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
					'phone' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 15, 'key' => 'index', 'collate' => 'utf8_unicode_ci', 'comment' => 'phone_login', 'charset' => 'utf8'),
					'phone_verified' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
					'vip_en' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
						'BY_EMAIL' => array('column' => 'email', 'unique' => 0),
						'created' => array('column' => 'created', 'unique' => 0),
						'last_action_user' => array('column' => 'last_action', 'unique' => 0),
						'device_id_email' => array('column' => array('device_id', 'email'), 'unique' => 0),
						'facebook_uid' => array('column' => 'facebook_uid', 'unique' => 0),
						'last_action' => array('column' => 'last_login', 'unique' => 0),
						'role' => array('column' => 'role', 'unique' => 0),
						'email_token' => array('column' => 'email_token', 'unique' => 0),
						'password_token' => array('column' => 'password_token', 'unique' => 0),
						'phone' => array('column' => 'phone', 'unique' => 0),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB'),
				),
			),
		),
		'down' => array(
			'drop_table' => array(
				'accounts', 'articles', 'categories', 'email_marketings', 'images', 'media', 'menus', 'users'
			),
		),
	);

/**
 * Before migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	public function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	public function after($direction) {
		return true;
	}
}
