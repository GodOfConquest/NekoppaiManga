<?php
$config["app.title"] = 'NekoppaiManga';
$config["app.description"] = 'An awesome manga site';
$config["app.language"] = 'English';
$config["app.appName"] = 'NekoppaiManga';
$config["email.from"] = 'admin@website.com';
$config["app.theme"] = 'default';
$config["app.cookiePrefix"] = 'wot';
$config["app.randomInit"] = 'lvh4asd';
$config["app.version"] = '1.1';
$config["app.db_host"] = '127.0.0.1';
$config["app.db_name"] = '';
$config["app.db_user"] = '';
$config["app.db_password"] = '';
$config["app.db_prefix"] = '';
$config["app.minifyJs"] = '1';
$config["app.minifyCss"] = '0';
$config["app.dateFormat"] = 'd/m/Y';
$config["app.timeFormat"] = 'g:i a';
$config["app.timezone"] = 'Asia/Ho_Chi_Minh';
$config["app.dateFormatCustom"] = 'd/m/Y';
$config["app.timeFormatCustom"] = 'g:i a';
$config["app.usernameRegex"] = '/^[a-zA-Z0-9_-]{3,16}$/';
$config["app.remoteVersion"] = 'http://wikichan.com/wasd/version/phpmanga/version.txt';
$config["app.startDate"] = 'Tue, 28 Oct 2014 20:30:48 +0700';
$config["app.installed"] = '0';
$config["email.confirmation"] = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
		<html lang=\'en\'>
		<head><meta content="text/html; charset=utf-8" http-equiv="Content-Type"><meta name="viewport" content="width=device-width" /></head>
		<body style=\'background-color: #f8f8f8; font-family: Helvetica, Arial; margin: 0 auto;width: 100%; padding:20px 0; line-height: 25px; font-size: 13px;\' bgcolor=\'#f8f8f8\'>
		<style type=\'text/css\'>
		a{color: #1ABC9C; text-decoration: none; font-weight: 700;}
		a:hover { color: #000 !important; border-radius: 5px !important; text-decoration: none !important; }
		></style>

		<table border=\'0\' cellpadding=\'0\' cellspacing=\'0\' style=\'background-color: #fff; margin-top: 25px; border: 1px solid #eee; display: block; width: 100%;\' class=\'container\' bgcolor=\'#fff\'>
			<tbody>
				<tr style=\'max-width: 600px; width: 100%; display: block; background-color: #34495e; border-bottom-color: #000; border-bottom-width: 1px; border-bottom-style: solid; color: #fff;\'>
					<td style=\'padding: 10px;\'>
					<h2 style=\'font-size: 18px; margin: 0; padding: 10px 0; width: 100%;\'>[{siteTitle}] Registration has been successful.</h2>
					</td>
				</tr>
				<tr style=\'max-width: 600px; width: 100%; display: block; border-bottom-color: #eee; border-bottom-width: 1px; border-bottom-style: solid;\'>
					<td style=\'padding: 10px;\'>
						Hello <b>{user}</b>,
						<br /><br />
						You have been successfully registered at {siteTitle}. To login you will have to activate your account by clicking the URL below.
						<br />
						{link}
					</td>
				</tr>
				<tr style=\'max-width: 600px; width: 100%; display: block; border-bottom-color: #eee; border-bottom-width: 1px; border-bottom-style: solid;\'>
					<td style=\'padding: 10px;\'>
						Best regards, <br />
						<b>{siteTitle}</b> Team <br />
						http://website.com | http://website.com
					</td>
				</tr>
			</tbody>
		</table>
		</body>
		</html';
$config["link.plugins"] = '/index';
$config["link.themes"] = '/index';
$config["link.languages"] = '/index';
$config["app.enabledPlugins"] = array (
);
$config["app.customCss"] = '';
$config["app.customJs"] = '';
$config["app.menu"] = '[home]
[directory]
';
$config["app.ads1"] = '';
$config["app.ads2"] = '';
$config["app.ads3"] = '';
$config["app.widget"] = '[manga-cover]
[search-box]
[listing-sidebar]
[manga-list2 quantity="2" title="Most popular" order="DESC" sorting="views"]
[fb-like-box show_faces=\'true\' stream=true show_border="false"]';
$config["app.footerLeft"] = 'NEKOPPAIMANGA &copy; 2015';
$config["app.footerRight"] = '<a href="/index">NekoppaiManga</a>';
$config["app.headerBrand"] = '<h1 class="text-uppercase" id="blog-name"><a href="/index">NekoppaiMANGA</a></h1>';
$config["app.homeContent"] = '[latest-manga title="50 Latest Manga" quantity="10"]
[latest-manga2 title="50 Latest Manga" quantity="10"]';
$config["app.mangaContent"] = '[manga-info]
[manga-chapter-list]
[fb-comment title="Facebook Comments" appId="733659116654232" quantity="15" color="light"]';
$config["app.chapterContent"] = '<div class="col-lg-4 col-lg-offset-4">[select-chapter]</div>
<div class="clearfix"><br /></div>
<div class="col-lg-4 col-lg-offset-4 text-center">[select-page]</div>
<div class="clearfix"><br /><br /><br /></div>
[read-pbp]
';
$config["app.chapterMenu"] = '[home title=\'Back 2 home\']';
$config["app.directoryContent"] = '[listing default="paging" perPage="50" default-sorting="name"]';
$config["app.textDirectoryContent"] = '[text-version]';
$config["app.confirmationNeed"] = '1';
$config["app.defaultGroup"] = '2';
$config["app.defaultRole"] = '1';
$config["app.guestRole"] = '3';
$config["app.defaultAvatar"] = '/upload/default.png';
$config["app.homeTitle"] = 'Free manga at {homeTitle}';
$config["app.homeDescription"] = 'Free manga, manhua, manhwa and comic at {homeTitle}';
$config["app.homeKeywords"] = 'manga, manhua, manhwa, comic, {homeTitle}';
$config["app.directoryTitle"] = 'Manga directory at {homeTitle} page {page}';
$config["app.directoryDescription"] = 'All manga, manhua, manhwa at {homeTitle} \'s directory';
$config["app.directoryKeywords"] = 'manga, manhua, manhwa, directory, manga collection, manga directory';
$config["app.mangaTitle"] = 'Read {name} ({released}) free at {homeTitle}';
$config["app.mangaDescription"] = '{mangaType} {name} free at {homeTitle}, updated chapter {lastChapter}';
$config["app.mangaKeywords"] = '{alternativeName}, {genre}, {name}';
$config["app.chapterTitle"] = 'Free reading {name} {chapterNumber} {chapterName} at {homeTitle}';
$config["app.chapterDescription"] = '{mangaType} {name} {chapterNumber} at {homeTitle}';
$config["app.chapterKeywords"] = '{name}, {chapterName}, read {name} {chapterNumber}';

// Last updated by @ Sat, 17 Jan 2015 05:50:49 +0700
?>