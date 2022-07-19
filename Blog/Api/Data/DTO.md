
<h3>Data Transfer Object (DTO)</h3>
<p>The DTO is responsible for representing the specific object &#x26; fields which we want to get &#x26; save data for. You can think of this as an interface-representation of an entity object.</p>
<pre><code>JonaM/Blog/Api
</code></pre>
<p>This directory is where the Service Contracts reside. And all DTO interfaces will go within another directory under that named:</p>
<pre><code>Data
</code></pre>
<p>Our DTO class will be named</p>
<pre><code>PostInterface
</code></pre>
<p>Again, this is an interface that represents our Post entity, so this naming makes sense.</p>
<p>Next comes a list of class constants which represent fields of our Post entity.</p>
<p>If we check out our db_schema_whitelist.json file, we can easily see our four fields of:</p>
<pre><code>id, title, content &#x26; created_at
</code></pre>
<p>We will create related class constants with the same names, just in uppercase, and set their values to their snake case column names.</p>
<p>So a constant for:</p>
<pre><code>  const ID = 'id';
  const TITLE = 'title';
  const CONTENT = 'content';
  const CREATED_AT = 'created_at';
</code></pre>
<p>We will then create a get and set function for each one of these fields.</p>
<p>Let's create a public function named getId. Something we need to know up front, right now, are a couple "gotchas":</p>
<ul>
  <li>We should not define scalar argument or return types in this interface, which are values of the type <strong>int, float, string</strong> or <strong>bool</strong></li>
  <li>We do in fact need to define all argument and return types as <strong>annotations within docblocks!</strong> Magento uses these annotations to determine how to convert data to and from JSON or XML.</li>
</ul>
<p>Knowing what we know now, let’s create our <code>docblock</code>, and <code>getId</code> will just return an <code>int</code>.</p>
<p>We'll also create a public function named setId that accepts an argument named <code>$id</code>. Then, we will generate the <code>docblocks</code>, making sure <code>$id</code> is of type <code>int</code>, and that it returns <code>$this</code>. Note that we must use fully-qualified class names, unless we are specifying <code>$this</code> as the return type.</p>
<pre><code>&#x3C;?php declare(strict_types=1);

namespace Macademy\Blog\Api\Data;

interface PostInterface
{
    const ID = 'id';
    const TITLE = 'title';
    const CONTENT = 'content';
    const CREATED_AT = 'created_at';

    /**
     ** @return int
     **/
    public function getId();

    /**
     ** @param int $id
     ** @return $this
     **/
    public function setId($id);
}
</code></pre>
<p>Do this for the other columns. These columns are just defined with get and set prefixes in camelCase format. The only difference being that we are updating the argument types to string, and we aren’t setting a <code>setCreatedAt</code> function since this value is set when a blog post is created.</p>
<p>Finally, we will create a docblock for our <code>PostInterface</code> and label it "Blog post interface", leaving an <code>@api</code> annotation that tells others this is a public API. We can also label our api with a <code>@since</code> annotation, specifying a version of this API, which we will start off as <code>1.0.0.</code></p>
<p>And with this definition for our post entity, we have defined a proper interface defined that can now be implemented in other interfaces &#x26; classes.</p>
<pre><code>&#x3C;?php declare(strict_types=1);

namespace Macademy\Blog\Api\Data;

use Magento\Tests\NamingConvention\true\string;

/***
 ** Blog post interface.
 ** @api
 ** @since 1.0.0
 */
interface PostInterface
{
    const ID = 'id';
    const TITLE = 'title';
    const CONTENT = 'content';
    const CREATED_AT = 'created_at';

    /**
     ** @return int
     **/
    public function getId();

    /**
     ** @param int $value
     ** @return $this
     **/
    public function setId($value);

    /**
     ** @return string
     **/
    public function getTitle();

    /**
     ** @param string $title
     ** @return $this
     **/
    public function setTitle($title);

    /**
     ** @return string
     **/
    public function getContent();

    /**
     ** @param string $content
     ** @return $this
     **/
    public function setContent($content);

    /**
     ** @return string
     **/
    public function getCreatedAt();
}
</code></pre>