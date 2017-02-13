<?php

require_once(dirname(dirname(__FILE__)) . '/lib/Application.php');
\Application::load();

class Bootstrap
{
    public static $firstNames = array(
        'aaron', 'adam', 'adrian', 'aiden', 'alan', 'alex', 'alexander', 'alfie', 'andrew', 'andy', 'anthony', 'archie', 'arthur',
        'abbie', 'abigail', 'adele', 'alexa', 'alexandra', 'alice', 'alison', 'amanda', 'amber', 'amelia', 'amy', 'anna', 'ashley', 'ava',
        'barry', 'ben', 'benjamin', 'bradley', 'brandon', 'bruce',
        'beth', 'bethany', 'becky',
        'callum', 'cameron', 'charles', 'charlie', 'chris', 'christian', 'christopher', 'colin', 'connor', 'craig',
        'caitlin', 'candice', 'carlie', 'carmen', 'carole', 'caroline', 'carrie', 'charlotte', 'chelsea', 'chloe', 'claire', 'courtney',
        'dale', 'damien', 'dan', 'daniel', 'darren', 'dave', 'david', 'dean', 'dennis', 'dominic', 'duncan', 'dylan',
        'daisy', 'danielle', 'donna',
        'edward', 'elliot', 'elliott', 'ethan',
        'eden', 'eileen', 'eleanor', 'elizabeth', 'ella', 'ellie', 'elsie', 'emily', 'emma', 'erin', 'eva', 'evelyn', 'evie',
        'finley', 'frank', 'fred', 'freddie',
        'faye', 'fiona', 'florence', 'francesca', 'freya',
        'gary', 'gavin', 'george', 'gordon', 'graham', 'grant', 'greg',
        'georgia', 'grace',
        'harley', 'harrison', 'harry', 'harvey', 'henry',
        'hannah', 'heather', 'helen', 'helena', 'hollie', 'holly',
        'ian', 'isaac',
        'imogen', 'isabel', 'isabella', 'isabelle', 'isla', 'isobel',
        'jack', 'jackson', 'jacob', 'jake', 'james', 'jamie', 'jason', 'jayden', 'jeremy', 'jim', 'joe', 'joel', 'john', 'jonathan', 'jordan', 'joseph', 'joshua',
        'jade', 'jane', 'jasmine', 'jennifer', 'jessica', 'joanne', 'jodie', 'julia', 'julie', 'justine',
        'karl', 'keith', 'ken', 'kevin', 'kieran', 'kyle',
        'karen', 'karlie', 'katie', 'keeley', 'kelly', 'kimberly', 'kirsten', 'kirsty',
        'lee', 'leo', 'lewis', 'liam', 'logan', 'louis', 'lucas', 'luke',
        'laura', 'lauren', 'layla', 'leah', 'leanne', 'lexi', 'lilly', 'lily', 'linda', 'lindsay', 'lisa', 'lizzie', 'lola', 'lucy',
        'mark', 'martin', 'mason', 'matthew', 'max', 'michael', 'mike', 'mohammed', 'muhammad',
        'maisie', 'mandy', 'maria', 'mary', 'matilda', 'megan', 'melissa', 'mia', 'millie', 'molly',
        'nathan', 'neil', 'nick', 'noah',
        'naomi', 'natalie', 'natasha', 'nicole', 'nikki',
        'oliver', 'oscar', 'owen',
        'olivia',
        'patrick', 'paul', 'pete', 'peter', 'philip',
        'patricia', 'paula', 'pauline', 'phoebe', 'poppy',
        'quentin',
        'ray', 'reece', 'riley', 'rob', 'ross', 'ryan',
        'rachel', 'rebecca', 'rosie', 'rowena', 'roxanne', 'ruby', 'ruth',
        'samuel', 'scott', 'sean', 'sebastian', 'stefan', 'stephen', 'steve',
        'sabrina', 'sally', 'samantha', 'sarah', 'sasha', 'scarlett', 'selina', 'shannon', 'sienna', 'sofia', 'sonia', 'sophia', 'sophie', 'stacey', 'stephanie','suzanne', 'summer',
        'theo', 'thomas', 'tim', 'toby', 'tom', 'tony', 'tyler',
        'tanya', 'tara', 'teagan', 'theresa', 'tiffany', 'tina', 'tracy',
        'vanessa', 'vicky', 'victoria',
        'wayne', 'will', 'william',
        'wendy',
        'yasmine', 'yvette', 'yvonne',
        'zachary', 'zach',
        'zoe'
    );

    public static $lastNames = array(
        'adams', 'allen', 'anderson',
        'bailey', 'baker', 'bell', 'bennett', 'brown', 'butler',
        'campbell', 'carter', 'chapman', 'clark', 'clarke', 'collins', 'cook', 'cooper', 'cox',
        'davies', 'davis',
        'edwards', 'ellis', 'evans',
        'fox',
        'graham', 'gray', 'green', 'griffiths',
        'hall', 'harris', 'harrison', 'hill', 'holmes', 'hughes', 'hunt', 'hunter',
        'jackson', 'james', 'johnson', 'jones',
        'kelly', 'kennedy', 'khan', 'king', 'knight',
        'lee', 'lewis', 'lloyd',
        'marshall', 'martin', 'mason', 'matthews', 'miller', 'mitchell', 'moore', 'morgan', 'morris', 'murphy', 'murray',
        'owen',
        'palmer', 'parker', 'patel', 'phillips', 'powell', 'price',
        'reid', 'reynolds', 'richards', 'richardson', 'roberts', 'robertson', 'robinson', 'rogers', 'rose', 'ross', 'russell',
        'saunders', 'scott', 'shaw', 'simpson', 'smith', 'stevens', 'stewart',
        'taylor', 'thomas', 'thompson', 'turner',
        'walker', 'walsh', 'ward', 'watson', 'white', 'wilkinson', 'williams', 'wilson', 'wood', 'wright',
        'young'
    );

    public static function generateName()
    {
        $name = array();
        array_push($name, array_rand(self::$firstNames));
        array_push($name, array_rand(self::$lastNames));
        return join(' ', $name);
    }
}