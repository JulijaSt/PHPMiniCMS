<?php

require_once "bootstrap.php";

use Models\Page;
use Models\User;

function createPage($entityManager, $pageName, $content)
{
    $link = strtolower($pageName);
    $page = new Page($link);
    $page->setContent($content);
    $entityManager->persist($page);
}

$admin = new User("admin", "admin123");
$entityManager->persist($admin);

createPage($entityManager, "Home", '<h1 style="line-height: 1.3;"><strong>There is your HOMEPAGE...</strong></h1>
<p>&nbsp;</p>
<p>You never get a second chance to make a first impression &mdash; that&rsquo;s why your homepage is undoubtedly one of the <em><strong>most important</strong></em> web pages on your website.</p>
<p>For any given company, the homepage is its virtual front door. If a new visitor doesn&rsquo;t like what they see, their knee-jerk reaction is to hit the &ldquo;back&rdquo; button.</p>
<p>That&rsquo;s right &mdash; unfortunately, a lot of people still judge a book by its cover.</p>
<p><span style="font-family: \'comic sans ms\', sans-serif;"><strong><em>What makes a website&rsquo;s homepage design brilliant instead of blah?</em></strong> Well, it takes more than looks alone &mdash; it also has to work well. That&rsquo;s why the most brilliant homepages on this list don&rsquo;t just score high in beauty, but also in brains.</span></p>');

createPage($entityManager, "About", '<h1><strong>Mistake #1: You don&rsquo;t have an About Page</strong></h1>
<p>&nbsp;</p>
<p>You might have some interesting content, a nice custom header, and a sweet design.</p>
<p><em><strong>What you don&rsquo;t have is an About Page.</strong></em></p>
<p>It might be completely missing because you think &ldquo;About Pages are a clich&eacute;.&rdquo;</p>
<p>Or because you&rsquo;re freaked out about writing an About Page, you&rsquo;re just hoping no one will notice it&rsquo;s missing.</p>
<p>Or you might have called it something clever like &ldquo;Experience&rdquo; or &ldquo;The Scoop&rdquo; or &ldquo;But Wait, There&rsquo;s More!&rdquo;</p>
<p>When it comes to the interface on your website or blog, never forget the words of usability expert Steve Krug: <span style="text-decoration: underline;"><em>Don&rsquo;t Make Me Think</em></span>.</p>
<p>I don&rsquo;t want to look at your &ldquo;Resonate&rdquo; Page and wonder if that&rsquo;s where I find out who you are, what you do, and why I should read your site.</p>
<p>&nbsp;</p>
<p><span style="color: #169179; font-size: 18pt;">Every site needs an About Page. Don&rsquo;t be clever. <span style="text-decoration: underline;"><em>Call it About.</em></span></span></p>');

createPage($entityManager, "Contact", '<p>Most contact pages are designed with function in mind.</p>
<p>They slap an <em>email address, phone, and location</em> on a plain background and call it a day.</p>
<p><em><strong>But basic contact pages don&rsquo;t inspire visitors to reach out and connect.</strong></em></p>
<p>Other pages make it easy to contact the company &ndash; which is awesome.</p>
<p>Except, that can also drive up customer service costs.</p>
<p><span style="font-family: terminal, monaco, monospace; font-size: 18pt;"><strong><span style="color: #3598db;">So what makes the perfect Contact Us page?</span></strong></span></p>
<p>An awesome Contact Us page finds just the right balance between making it easy to reach the company and sharing resources users can use to answer their questions right away.</p>
<p>&nbsp;</p>');

$entityManager->flush();
