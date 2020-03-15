<h1>Generate Uniqua Short <code>URL</code></h1>

<h4>Requirement</h4>
<ul>
<li><b>PHP</b> > 7.0 (Reccomended 7.3)</li>
<li><b>IE</b> > 10 (EDGE) or latest versions popular browsers</li>
</ul>

<h4>Logical</h4>
<ol>
<li></li>
<li>Get <code>URL</code> from form</li>
<li>Check existence <code>URL</code> in database    
    <ul>
    <li>true  - to paragraph 5</li>
    <li>false - to paragraph 4</li>
    </ul>
</li>
<li>Check existence token in database
    <ul>
    <li>true  - new generate          - to paragraph 4</li>
    <li>false - inert in database <code>token</code> and original <code>URL</code> - to paragraph 5</li>
    </ul>
</li>
<li>Show to front</li>
</ol>

<h4>Front Functions</h4>
<ol>
<li><b><code>get_template_directory_uri()</code></b></li>
<li><b><code>the_block()</code></b></li>
</ol>

<h4>Classes</h4>
<ol>
<li><b><code>Debug</code></b></li>
<li><b><code>Route</code></b></li>
<li><b><code>Url</code></b></li>
<li><b><code>DataBase</code></b></li>
</ol>