# PHP Enterprise Edition

Este é um projeto que tem como objetivo nivelar a experiência de uso da API do PHP criando wrappers para os recursos da linguagem e entregando helpers que quase todo projeto necessita.

Um exmplo, ao invés de usar `file_put_contents()` podemos usar `Php\File::write()`

## Pseudônimos para as Extensões:

### Base64
 - #### **string encode(string $string)<br>**
   alias: https://php.net/base64_encode<br>
   ex.: Php\Base64::encode(_string_);
 - #### **string decode(string $string, bool $strict = null)<br>**
   alias: https://php.net/base64_decode<br>
   ex.: Php\Base64::decode(_string_, _boolean_);
 
### Encode
 - #### **string ascii(string $string)<br>**
   alias: https://php.net/ord<br>
   ex.: Php\Encode::ascii(_string_);
 - #### **string soundex(string $string)<br>**
   alias: https://php.net/soundex<br>
   ex.: Php\Encode::soundex(_string_);
 
### File
 - #### **int write(string $filename, mixed $data, int $flags = 0, resource $context = null)<br>**
   alias: https://php.net/file_put_contents<br>
   ex.: Php\File::write(_string_, _mixed_, _int_, _resource_);
 - #### **string read(string $filename, bool $use_include_path = false, resource $context = null, int $offset = 0, int $maxlen = null)<br>**
   alias: https://php.net/file_get_contents<br>
   ex.: Php\File::read(_string_, _boolean_, _resource_, _ìnt_, _ìnt_);
 - #### **bool exists(string $filename)<br>**
   alias: https://php.net/file_exists<br>
   ex.: Php\File::exists(_string_);
 
### Hash
 - #### **string md5(string $string, bool $raw = false)<br>**
   alias: https://php.net/md5<br>
   ex.: Php\Hash::md5(_string_, _bool_);
 - #### **string sha1(string $string, bool $raw = false)<br>**
   alias: https://php.net/sha1<br>
   ex.: Php\Hash::sha1(_string_, _bool_);

### JSON
 - #### **string encode(mixed $value, int $options = 0, int $depth = 512)<br>**
   alias: https://php.net/json_encode<br>
   ex.: Php\JSON::encode(_string_, _int_, _int_);
 - #### **string decode(string $json, bool $assoc = false, int $depth = 512, int $options = 0)<br>**
   alias: https://php.net/json_decode<br>
   ex.: Php\JSON::decode(_string_, _bool_, _int_, _int_);

### Regex
 - #### **string split($pattern, string $subject, int $limit = -1, int $flags = 0)<br>**
   alias: https://php.net/preg_split<br>
   ex.: Php\Regex::split(_string_, _string_, _int_, _int_);

### Text
 - #### **int length(string $string)<br>**
   alias: https://php.net/strlen
   ex.: Php\Text::length(_string_);
   
 - #### **string replace(string $string, string $search, string $replace)<br>**
   alias: https://php.net/str_replace
   ex.: Php\Text::replace(_string_, _string_, _string_);
   
 - #### **mixed first(string $string, string $search)<br>**
   alias: https://php.net/strpos
   ex.: Php\Text::first(_string_, _string_);
   
 - #### **mixed last(string $string, string $search)<br>**
   alias: https://php.net/strrchr
   ex.: Php\Text::last(_string_, _string_);
   
 - #### **string upper(string $string)<br>**
   alias: https://php.net/strtoupper
   ex.: Php\Text::upper(_string_);
   
 - #### **string lower(string $string)<br>**
   alias: https://php.net/strtolower
   ex.: Php\Text::lower(_string_);
   
 - #### **string capitalize(string $string)<br>**
   alias: https://php.net/ucwords
   ex.: Php\Text::capitalize(_string_);
   
 - #### **string unCapitalize(string $string)<br>**
   alias: https://php.net/lcfirst
   ex.: Php\Text::unCapitalize(_string_);
   
 - #### **array split(string $delimiter, string $string, int $limit = null)<br>**
   alias: https://php.net/explode
   ex.: Php\Text::split(_string_, _string_, _int_);
   
 - #### **string join(string $glue, array $pieces)<br>**
   alias: https://php.net/implode
   ex.: Php\Text::join(_string_, _array_);
   
 - #### **string levenshtein(string $a, string $b)<br>**
   alias: https://php.net/levenshtein
   ex.: Php\Text::levenshtein(_string_, _string_);
   
 - #### **string substring(string $string , int $start, int $length = null)<br>**
   alias: https://php.net/substr
   ex.: Php\Text::substring(_string_, _int_, _int_);
   
 - #### **string trim(string $string , string $characters = null)<br>**
   alias: https://php.net/trim
   ex.: Php\Text::trim(_string_, _string_);
   
 - #### **string wrap(string $string , int $width = 75, string $break = "\n", bool $cut = false)<br>**
   alias: https://php.net/wordwrap
   ex.: Php\Text::wrap(_string_, _int_, _string_, _bool_);
   
 - #### **int compare(string $a, string $b)<br>**
   alias: https://php.net/strcmp
   ex.: Php\Text::compare(_string_, _string_);
   
 - #### **array divide(string $string, int $length = 1)<br>**
   alias: https://php.net/str_split
   ex.: Php\Text::divide(_string_, _int_);
   
 - #### **string shuffle(string $string)<br>**
   alias: https://php.net/str_shuffle
   ex.: Php\Text::shuffle(_string_);
   
 - #### **string repeat(string $string, int $multiplier)<br>**
   alias: https://php.net/str_repeat
   ex.: Php\Text::repeat(_string_, _int_);
   
## Recursos Adicionais:

### Http
 - #### **mixed post(string $index)<br>**
   ex.: Php\Http::post(_string_)
   Pega um valor do $_POST
   
 - #### **mixed get(string $index)<br>**
   Pega um valor do $_GET
   ex.: Php\Http::post(_string_)
   
 - #### **mixed file(string $index)<br>**
   Pega um valor do $_FILES
   ex.: Php\Http::post(_string_)
   
 - #### **mixed all($index = null)<br>**
   Pega um valor do $_REQUEST
   ex.: Php\Http::all(_string_)

### Url
 - #### **string host()<br>**
   Pega o nome do host da aplicação
   ex.: Php\Url::host()
 
 - #### **string current()<br>**
   Pega a URL em que a aplicação teve a requisição atual solicitada
   ex.: Php\Url::current()
   
   
