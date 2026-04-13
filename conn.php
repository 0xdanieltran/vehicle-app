<?php
include_once 'models/users.php';
include_once 'models/accounts.php';

$conn = pg_connect("dbname=db2 user=postgres password=123")or die('Error is occured');

// Create database
$sql1 = 'CREATE TABLE IF NOT EXISTS "public"."tbl_account" (
			"id" SERIAL PRIMARY KEY,
			"account_name" varchar(255) COLLATE "pg_catalog"."default",
			"account_fullname" varchar(255) COLLATE "pg_catalog"."default",
			"flag_del" int2,
			"avatar_name" varchar(255) COLLATE "pg_catalog"."default"
		)
		;
		  CREATE TABLE IF NOT EXISTS "public"."tbl_device" (
			"id" SERIAL PRIMARY KEY,
			"serial_num" varchar(255) COLLATE "pg_catalog"."default",
			"account_id" int4 NOT NULL,
			"location_id" int4 NOT NULL,
			"created_at" timestamp(6),
			"flag_del" int4 NOT NULL
		  )
		  ;
		  CREATE TABLE IF NOT EXISTS "public"."tbl_location" (
			"id" SERIAL PRIMARY KEY,
			"location_name" varchar(255) COLLATE "pg_catalog"."default",
			"creator_id" int4 NOT NULL,
			"flag_del" int4 NOT NULL,
			"created_at" date,
			"account_id" int4 NOT NULL
		  )
		  ;
		  CREATE TABLE IF NOT EXISTS "public"."tbl_server" (
			"id" SERIAL PRIMARY KEY,
			"server_name" varchar(255) COLLATE "pg_catalog"."default",
			"server_url" varchar(255) COLLATE "pg_catalog"."default",
			"bucket_name" varchar(255) COLLATE "pg_catalog"."default",
			"access_key" varchar(255) COLLATE "pg_catalog"."default",
			"secret_access_key" varchar(255) COLLATE "pg_catalog"."default",
			"created_at" date NOT NULL,
			"flag_del" int4 NOT NULL,
			"writtable" bool
		  )
		  ;
		  CREATE TABLE IF NOT EXISTS "public"."tbl_snapshot" (
			"id" SERIAL PRIMARY KEY,
			"license_plate" varchar(255) COLLATE "pg_catalog"."default",
			"upload_time" timestamp(6),
			"location_id" int4,
			"path" varchar(255) COLLATE "pg_catalog"."default"
		  )
		  ;
		  CREATE TABLE IF NOT EXISTS "public"."tbl_user" (
			"id" SERIAL PRIMARY KEY,
			"user_name" varchar(255) COLLATE "pg_catalog"."default",
			"user_fullname" varchar(255) COLLATE "pg_catalog"."default",
			"account_id" int4 NOT NULL,
			"device_id" int4,
			"location_id" int4,
			"flag_del" int4 NOT NULL,
			"role" int4,
			"created_at" timestamp(0),
			"creator_id" int4,
			"password" varchar(255) COLLATE "pg_catalog"."default",
			"email" varchar(255) COLLATE "pg_catalog"."default"
		  )
		  ;';

if (pg_query($conn, $sql1)) {
    $json = file_get_contents('my_data.json');
    $json_data = json_decode($json, true);

    $user[0] = $json_data['SysAdmin']['user_name'];
    $user[1] = $json_data['SysAdmin']['user_fullname'];
    $user[2] = $json_data['SysAdmin']['account_id'];
    $user[3] = 'null';
    $user[4] = $json_data['SysAdmin']['flag_del'];
    $user[5] = $json_data['SysAdmin']['role'];
    $user[6] = date('Y/m/d H:i:s');
    $user[7] = 0;
    $user[8] = $json_data['SysAdmin']['email'];
    $user[9] = $json_data['SysAdmin']['password'];

    $account[0] = $json_data['Account']['account_name'];
    $account[1] = $json_data['Account']['account_fullname'];


    if (!get_default_superadmin($conn)) {
        add_admin($conn, $user);
        add_account($conn, $account);

		$sql_insert =
		"INSERT INTO tbl_snapshot  (license_plate, upload_time, location_id, path) VALUES ('234235233', '2022-02-01 05:23:24', 3, 'views/images/user/gallery/modal_car.png');
		INSERT INTO tbl_snapshot  (license_plate, upload_time, location_id, path) VALUES ('234235235', '2022-03-17 05:22:19', 2, 'views/images/user/gallery/car2.png');
		INSERT INTO tbl_snapshot  (license_plate, upload_time, location_id, path) VALUES ('234235235', '2022-03-17 05:22:19', 2, 'views/images/user/gallery/car2.png');
		INSERT INTO tbl_snapshot  (license_plate, upload_time, location_id, path) VALUES ('234235235', '2022-02-17 05:21:47', 3, 'views/images/user/gallery/car3.png');
		INSERT INTO tbl_snapshot  (license_plate, upload_time, location_id, path) VALUES ('234235235', '2022-02-07 05:17:49', 5, 'views/images/user/gallery/car1.png');
		INSERT INTO tbl_snapshot  (license_plate, upload_time, location_id, path) VALUES ('234235234', '2022-03-18 05:22:59', 4, 'views/images/user/gallery/car4.png');
		INSERT INTO tbl_snapshot  (license_plate, upload_time, location_id, path) VALUES ('234235234', '2022-01-11 05:24:33', 7, 'views/images/user/gallery/modal_car0.png');
		INSERT INTO tbl_snapshot  (license_plate, upload_time, location_id, path) VALUES ('234235235', '2022-02-10 05:21:10', 1, 'views/images/user/gallery/car2.png');
		INSERT INTO tbl_snapshot  (license_plate, upload_time, location_id, path) VALUES ('234235233', '2022-03-17 05:27:05', 2, 'views/images/user/gallery/car4.png');
		INSERT INTO tbl_snapshot  (license_plate, upload_time, location_id, path) VALUES ('234235234', '2022-02-18 05:25:41', 3, 'views/images/user/gallery/car2.png');
		INSERT INTO tbl_snapshot  (license_plate, upload_time, location_id, path) VALUES ('234235235', '2022-02-24 05:26:29', 4, 'views/images/user/gallery/car3.png');
		INSERT INTO tbl_snapshot  (license_plate, upload_time, location_id, path) VALUES ('234235234', '2022-02-01 05:23:24', 2, 'views/images/user/gallery/modal_car.png');
		INSERT INTO tbl_snapshot  (license_plate, upload_time, location_id, path) VALUES ('234235233', '2022-02-18 05:25:41', 5, 'views/images/user/gallery/car2.png');
		INSERT INTO tbl_snapshot  (license_plate, upload_time, location_id, path) VALUES ('234235235', '2022-01-01 05:23:24', 3, 'views/images/user/gallery/modal_car.png');
		INSERT INTO tbl_snapshot  (license_plate, upload_time, location_id, path) VALUES ('234235235', '2022-02-17 05:27:05', 4, 'views/images/user/gallery/car4.png');
		INSERT INTO tbl_snapshot  (license_plate, upload_time, location_id, path) VALUES ('234235234', '2022-02-01 05:27:05', 5, 'views/images/user/gallery/car4.png');
		INSERT INTO tbl_snapshot  (license_plate, upload_time, location_id, path) VALUES ('234235233', '2022-02-01 05:23:24', 6, 'views/images/user/gallery/modal_car.png');
		INSERT INTO tbl_snapshot  (license_plate, upload_time, location_id, path) VALUES ('234235234', '2022-03-17 05:27:05', 1, 'views/images/user/gallery/car4.png');
		INSERT INTO tbl_snapshot  (license_plate, upload_time, location_id, path) VALUES ('234235233', '2022-02-01 05:23:24', 3, 'views/images/user/gallery/modal_car.png');
		INSERT INTO tbl_snapshot  (license_plate, upload_time, location_id, path) VALUES ('234235235', '2022-03-17 05:22:19', 4, 'views/images/user/gallery/car2.png');
		INSERT INTO tbl_snapshot  (license_plate, upload_time, location_id, path) VALUES ('234235233', '2022-03-18 05:22:59', 3, 'views/images/user/gallery/car4.png');
		INSERT INTO tbl_snapshot  (license_plate, upload_time, location_id, path) VALUES ('234235235', '2022-02-17 05:21:47', 4, 'views/images/user/gallery/car3.png');
		INSERT INTO tbl_snapshot  (license_plate, upload_time, location_id, path) VALUES ('234235234', '2022-02-07 05:17:49', 3, 'views/images/user/gallery/car1.png');
		INSERT INTO tbl_snapshot  (license_plate, upload_time, location_id, path) VALUES ('234235235', '2022-02-10 05:21:10', 5, 'views/images/user/gallery/car2.png');
		INSERT INTO tbl_snapshot  (license_plate, upload_time, location_id, path) VALUES ('234235235', '2022-01-11 05:24:33', 6, 'views/images/user/gallery/modal_car0.png');
		INSERT INTO tbl_snapshot  (license_plate, upload_time, location_id, path) VALUES ('234235233', '2022-02-17 05:25:02', 6, 'views/images/user/gallery/car1.png');
		INSERT INTO tbl_snapshot  (license_plate, upload_time, location_id, path) VALUES ('234235235', '2022-02-17 05:25:02', 1, 'views/images/user/gallery/car1.png');
		INSERT INTO tbl_snapshot  (license_plate, upload_time, location_id, path) VALUES ('234235234', '2022-02-24 05:26:29', 2, 'views/images/user/gallery/car3.png');
		INSERT INTO tbl_snapshot  (license_plate, upload_time, location_id, path) VALUES ('234235235', '2022-01-17 05:27:05', 3, 'views/images/user/gallery/car4.png');
		";

		pg_query($conn, $sql_insert);
	}
} else {
    echo "Error creating database: " . $conn->error;
}
