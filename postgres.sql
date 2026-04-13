/*
 Navicat Premium Data Transfer

 Source Server         : postgre
 Source Server Type    : PostgreSQL
 Source Server Version : 130004
 Source Host           : localhost:5432
 Source Catalog        : postgres
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 130004
 File Encoding         : 65001

 Date: 23/03/2022 03:47:43
*/


-- ----------------------------
-- Sequence structure for tbl_account_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."tbl_account_id_seq";
CREATE SEQUENCE "public"."tbl_account_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for tbl_device_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."tbl_device_id_seq";
CREATE SEQUENCE "public"."tbl_device_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for tbl_user_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."tbl_user_id_seq";
CREATE SEQUENCE "public"."tbl_user_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for user_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."user_id_seq";
CREATE SEQUENCE "public"."user_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Table structure for tbl_account
-- ----------------------------
DROP TABLE IF EXISTS "public"."tbl_account";
CREATE TABLE "public"."tbl_account" (
  "id" int4 NOT NULL DEFAULT nextval('tbl_user_id_seq'::regclass),
  "account_name" varchar(255) COLLATE "pg_catalog"."default",
  "account_fullname" varchar(255) COLLATE "pg_catalog"."default",
  "flag_del" int2,
  "avatar_name" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of tbl_account
-- ----------------------------
INSERT INTO "public"."tbl_account" VALUES (1, 'BENZ', 'BENZ', 0, 'upload/6489504.jpg');
INSERT INTO "public"."tbl_account" VALUES (2, 'BMW', 'BMW', 0, 'upload/Russian.jpg');
INSERT INTO "public"."tbl_account" VALUES (3, 'Toyoda', 'Toyoda', 0, 'upload/Japan.jpg');

-- ----------------------------
-- Table structure for tbl_device
-- ----------------------------
DROP TABLE IF EXISTS "public"."tbl_device";
CREATE TABLE "public"."tbl_device" (
  "id" int4 NOT NULL DEFAULT nextval('tbl_device_id_seq'::regclass),
  "serial_num" varchar(255) COLLATE "pg_catalog"."default",
  "account_id" int4,
  "location_id" int4,
  "created_at" timestamp(6),
  "flag_del" int4 NOT NULL
)
;

-- ----------------------------
-- Records of tbl_device
-- ----------------------------
INSERT INTO "public"."tbl_device" VALUES (6, '34789234', NULL, NULL, '2022-03-28 08:08:20', 0);
INSERT INTO "public"."tbl_device" VALUES (5, '34323456', NULL, NULL, '2022-03-27 21:14:44', 0);
INSERT INTO "public"."tbl_device" VALUES (4, '76345899', NULL, NULL, '2022-03-28 08:06:27', 0);
INSERT INTO "public"."tbl_device" VALUES (2, '86456345', NULL, NULL, '2022-03-28 08:07:04', 0);
INSERT INTO "public"."tbl_device" VALUES (1, '45567678', NULL, NULL, '2022-03-28 08:08:56', 0);
INSERT INTO "public"."tbl_device" VALUES (3, '12565690', NULL, NULL, '2022-03-28 08:07:36', 0);

-- ----------------------------
-- Table structure for tbl_location
-- ----------------------------
DROP TABLE IF EXISTS "public"."tbl_location";
CREATE TABLE "public"."tbl_location" (
  "id" int4 NOT NULL DEFAULT nextval('tbl_user_id_seq'::regclass),
  "location_name" varchar(255) COLLATE "pg_catalog"."default",
  "creator_id" int4 NOT NULL,
  "flag_del" int4 NOT NULL,
  "created_at" date,
  "account_id" int4 NOT NULL
)
;

-- ----------------------------
-- Records of tbl_location
-- ----------------------------
INSERT INTO "public"."tbl_location" VALUES (1, 'Polska', 4, 0, '2022-03-27', 549);
INSERT INTO "public"."tbl_location" VALUES (2, 'Netherland', 4, 0, '2022-03-28', 549);
INSERT INTO "public"."tbl_location" VALUES (3, 'Norway', 4, 0, '2022-03-28', 549);
INSERT INTO "public"."tbl_location" VALUES (4, 'Nigeria', 4, 0, '2022-03-28', 549);
INSERT INTO "public"."tbl_location" VALUES (5, 'asdfasdf', 4, 0, '2022-03-29', 549);
INSERT INTO "public"."tbl_location" VALUES (6, 'Berlin', 4, 0, '2022-03-29', 549);
INSERT INTO "public"."tbl_location" VALUES (7, 'Bangcoc', 4, 0, '2022-03-29', 549);

-- ----------------------------
-- Table structure for tbl_server
-- ----------------------------
DROP TABLE IF EXISTS "public"."tbl_server";
CREATE TABLE "public"."tbl_server" (
  "id" int4 NOT NULL DEFAULT nextval('tbl_user_id_seq'::regclass),
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

-- ----------------------------
-- Records of tbl_server
-- ----------------------------
INSERT INTO "public"."tbl_server" VALUES (1, 'server_234', 'https://serwer-url.com', 'cool_bucket_1', '123mf6ohjad7', 'mjg69sv64ew0', '2022-03-28', 1, 't');
INSERT INTO "public"."tbl_server" VALUES (2, 'serwer_12', 'https://serwer-url.com', 'cool_bucket', '123mf6ohjad7', 'mjg69sv64ew0', '2022-03-27', 0, 't');

-- ----------------------------
-- Table structure for tbl_snapshot
-- ----------------------------
DROP TABLE IF EXISTS "public"."tbl_snapshot";
CREATE TABLE "public"."tbl_snapshot" (
  "id" int4 NOT NULL DEFAULT nextval('tbl_user_id_seq'::regclass),
  "license_plate" varchar(255) COLLATE "pg_catalog"."default",
  "upload_time" timestamp(6),
  "location_id" int4,
  "path" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of tbl_snapshot
-- ----------------------------
INSERT INTO "public"."tbl_snapshot" VALUES (28, '234235233', '2022-02-01 05:23:24', 3, 'views/images/user/gallery/modal_car.png');
INSERT INTO "public"."tbl_snapshot" VALUES (29, '234235235', '2022-03-17 05:22:19', 2, 'views/images/user/gallery/car2.png');
INSERT INTO "public"."tbl_snapshot" VALUES (1, '234235235', '2022-03-17 05:22:19', 2, 'views/images/user/gallery/car2.png');
INSERT INTO "public"."tbl_snapshot" VALUES (2, '234235235', '2022-02-17 05:21:47', 3, 'views/images/user/gallery/car3.png');
INSERT INTO "public"."tbl_snapshot" VALUES (3, '234235235', '2022-02-07 05:17:49', 5, 'views/images/user/gallery/car1.png');
INSERT INTO "public"."tbl_snapshot" VALUES (4, '234235234', '2022-03-18 05:22:59', 4, 'views/images/user/gallery/car4.png');
INSERT INTO "public"."tbl_snapshot" VALUES (5, '234235234', '2022-01-11 05:24:33', 7, 'views/images/user/gallery/modal_car0.png');
INSERT INTO "public"."tbl_snapshot" VALUES (6, '234235235', '2022-02-10 05:21:10', 1, 'views/images/user/gallery/car2.png');
INSERT INTO "public"."tbl_snapshot" VALUES (7, '234235233', '2022-03-17 05:27:05', 2, 'views/images/user/gallery/car4.png');
INSERT INTO "public"."tbl_snapshot" VALUES (8, '234235234', '2022-02-18 05:25:41', 3, 'views/images/user/gallery/car2.png');
INSERT INTO "public"."tbl_snapshot" VALUES (9, '234235235', '2022-02-24 05:26:29', 4, 'views/images/user/gallery/car3.png');
INSERT INTO "public"."tbl_snapshot" VALUES (10, '234235234', '2022-02-01 05:23:24', 2, 'views/images/user/gallery/modal_car.png');
INSERT INTO "public"."tbl_snapshot" VALUES (11, '234235233', '2022-02-18 05:25:41', 5, 'views/images/user/gallery/car2.png');
INSERT INTO "public"."tbl_snapshot" VALUES (12, '234235235', '2022-01-01 05:23:24', 3, 'views/images/user/gallery/modal_car.png');
INSERT INTO "public"."tbl_snapshot" VALUES (13, '234235235', '2022-02-17 05:27:05', 4, 'views/images/user/gallery/car4.png');
INSERT INTO "public"."tbl_snapshot" VALUES (14, '234235234', '2022-02-01 05:27:05', 5, 'views/images/user/gallery/car4.png');
INSERT INTO "public"."tbl_snapshot" VALUES (15, '234235233', '2022-02-01 05:23:24', 6, 'views/images/user/gallery/modal_car.png');
INSERT INTO "public"."tbl_snapshot" VALUES (16, '234235234', '2022-03-17 05:27:05', 1, 'views/images/user/gallery/car4.png');
INSERT INTO "public"."tbl_snapshot" VALUES (17, '234235233', '2022-02-01 05:23:24', 3, 'views/images/user/gallery/modal_car.png');
INSERT INTO "public"."tbl_snapshot" VALUES (18, '234235235', '2022-03-17 05:22:19', 4, 'views/images/user/gallery/car2.png');
INSERT INTO "public"."tbl_snapshot" VALUES (19, '234235233', '2022-03-18 05:22:59', 3, 'views/images/user/gallery/car4.png');
INSERT INTO "public"."tbl_snapshot" VALUES (20, '234235235', '2022-02-17 05:21:47', 4, 'views/images/user/gallery/car3.png');
INSERT INTO "public"."tbl_snapshot" VALUES (21, '234235234', '2022-02-07 05:17:49', 3, 'views/images/user/gallery/car1.png');
INSERT INTO "public"."tbl_snapshot" VALUES (22, '234235235', '2022-02-10 05:21:10', 5, 'views/images/user/gallery/car2.png');
INSERT INTO "public"."tbl_snapshot" VALUES (23, '234235235', '2022-01-11 05:24:33', 6, 'views/images/user/gallery/modal_car0.png');
INSERT INTO "public"."tbl_snapshot" VALUES (24, '234235233', '2022-02-17 05:25:02', 6, 'views/images/user/gallery/car1.png');
INSERT INTO "public"."tbl_snapshot" VALUES (25, '234235235', '2022-02-17 05:25:02', 1, 'views/images/user/gallery/car1.png');
INSERT INTO "public"."tbl_snapshot" VALUES (26, '234235234', '2022-02-24 05:26:29', 2, 'views/images/user/gallery/car3.png');
INSERT INTO "public"."tbl_snapshot" VALUES (27, '234235235', '2022-01-17 05:27:05', 3, 'views/images/user/gallery/car4.png');

-- ----------------------------
-- Table structure for tbl_user
-- ----------------------------
DROP TABLE IF EXISTS "public"."tbl_user";
CREATE TABLE "public"."tbl_user" (
  "id" int4 NOT NULL DEFAULT nextval('tbl_user_id_seq'::regclass),
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
;

-- ----------------------------
-- Records of tbl_user
-- ----------------------------
INSERT INTO "public"."tbl_user" VALUES (1, 'sysadmin', 'sysadmin', 1, NULL, NULL, 0, 100, '2022-03-25 15:07:29', 0, '96e79218965eb72c92a549dd5a330112', 'sysadmin@gmail.com');
INSERT INTO "public"."tbl_user" VALUES (2, 'Olga', 'Olga Slavar', 1, NULL, NULL, 0, 200, '2022-03-29 18:05:05', 1, NULL, 'olgaslvar@gmail.com');
INSERT INTO "public"."tbl_user" VALUES (3, 'Beast12', 'BeautyandBeast12', 1, NULL, NULL, 0, 200, '2022-03-28 14:25:29', 1, '96e79218965eb72c92a549dd5a330112', 'beautyandbeast@gmail.com');
INSERT INTO "public"."tbl_user" VALUES (4, 'Maxim', 'Maxim Lazarev', 1, NULL, NULL, 0, 300, '2022-03-27 15:42:44', 1, '96e79218965eb72c92a549dd5a330112', 'codemaster0208@gmail.com');

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."tbl_account_id_seq"
OWNED BY "public"."tbl_account"."id";
SELECT setval('"public"."tbl_account_id_seq"', 48, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."tbl_device_id_seq"
OWNED BY "public"."tbl_device"."id";
SELECT setval('"public"."tbl_device_id_seq"', 16, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."tbl_user_id_seq"
OWNED BY "public"."tbl_user"."id";
SELECT setval('"public"."tbl_user_id_seq"', 603, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."user_id_seq"', 1, false);

-- ----------------------------
-- Primary Key structure for table tbl_account
-- ----------------------------
ALTER TABLE "public"."tbl_account" ADD CONSTRAINT "tbl_account_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table tbl_device
-- ----------------------------
ALTER TABLE "public"."tbl_device" ADD CONSTRAINT "tbl_device_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table tbl_location
-- ----------------------------
ALTER TABLE "public"."tbl_location" ADD CONSTRAINT "tbl_location_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table tbl_server
-- ----------------------------
ALTER TABLE "public"."tbl_server" ADD CONSTRAINT "tbl_server_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table tbl_snapshot
-- ----------------------------
ALTER TABLE "public"."tbl_snapshot" ADD CONSTRAINT "tbl_snapshot_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table tbl_user
-- ----------------------------
ALTER TABLE "public"."tbl_user" ADD CONSTRAINT "tbl_user_pkey" PRIMARY KEY ("id");
