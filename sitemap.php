<?php
 
ob_start();
 
session_start();
require_once("core/mysql.php");  // serpito database class
 
$xml_path = $_SERVER&#91;'DOCUMENT_ROOT'&#93;."/sitemap.xml";
define("PATH","http://www.mywebsite.com/");
 
$xml_output = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
$xml_output .= '<urlset
xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
 
$xml_output.="<url>
<loc>".PATH."</loc>
<lastmod>".date("Y-m-d")."</lastmod>
<changefreq>weekly</changefreq>
<priority>1</priority>
</url>";
 
 
while($row=$db->fassoc($s)){
$url= PATH.$row['username'];
$xml_output .= "\t<url>\n";
$xml_output .= "\t\t<loc>".$url."</loc>\n
\t<lastmod>".date("Y-m-d")."</lastmod>\n";
$xml_output .= "\t\t<changefreq>monthly</changefreq>\n";
$xml_output .= "\t\t<priority>0.8</priority>\n";
$xml_output .= "\t</url>\n";
}
 
$xml_output .= "</urlset>";
$yaz=fopen($xml_path, "w");
echo "<p>Sayfa &amp;amp;amp;amp;amp;amp; Kanal XML Sitemap Hazırlandı. (".date("d.m.Y").")</p><hr>";
 
fwrite($yaz,$xml_output);
fclose($yaz);
 
 
?>