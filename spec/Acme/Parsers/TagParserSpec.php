<?php

namespace spec\Acme\Parsers;

use Acme\Parsers\TagParser;
use PhpSpec\ObjectBehavior;

class TagParserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(TagParser::class);
    }

    function it_parses_comma_separated_list_of_tags_into_an_array()
    {
        $this->parse('foo,bar,baz')->shouldReturn(['foo', 'bar', 'baz']);
        $this->parse('foo ,bar, baz')->shouldReturn(['foo', 'bar', 'baz']);
    }

    function it_allows_for_a_pipe_separator()
    {
        $this->parse('foo|bar|baz')->shouldReturn(['foo', 'bar', 'baz']);
    }
}
