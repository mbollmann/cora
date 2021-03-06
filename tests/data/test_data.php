<?php 
/*
 * Copyright (C) 2015 Marcel Bollmann <bollmann@linguistics.rub.de>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of
 * this software and associated documentation files (the "Software"), to deal in
 * the Software without restriction, including without limitation the rights to
 * use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
 * the Software, and to permit persons to whom the Software is furnished to do so,
 * subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
 * FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
 * COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
 * IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
 * CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */ ?>
<?php

/** Expected data for DBInterface_test
 *
 *  02/2013 Florian Petran
 *
 *  TODO would be better to read it from a separate file instead
 *  of defining it in a huge function, but this works for now
 */
function get_DBInterface_expected() {
   return array(
        "users" => array(
            "system"    => array("id" => "1",
                                 "name" => "system",
                                 "admin" => "1",
                                 "lastactive" => "2013-01-16 14:22:57" ),
            "test"      => array("id" => "5",
                                 "name" => "test",
                                 "admin" => "0",
                                 "lastactive" => "2013-01-22 15:38:32"),
            "bollmann"  => array("id" => "3",
                                 "name" => "bollmann",
                                 "admin" => "1",
                                 "lastactive" => "2013-02-04 11:29:04")
        ),
        "settings" => array(
            "test" => array("lines_per_page" => "30",
                            "lines_context" => "5",
                            "columns_order" => null,
                            "columns_hidden" => null,
                            "show_error" => "1",
                            "text_preview" => "utf",
                            "locale" => "en-US")
        ),
	"tagsets" => array(
			   "ts1" => array("id" => '1',
					  "name" => "ImportTest",
					  "class" => "pos",
					  "set_type" => "closed"),
			   "ts2" => array("id" => '2',
					  "name" => "NormTest",
					  "class" => "norm",
					  "set_type" => "open"),
			   "ts3" => array("id" => '3',
					  "name" => "LemmaTest",
					  "class" => "lemma",
					  "set_type" => "open"),
			   "ts4" => array("id" => '4',
					  "name" => "Comment",
					  "class" => "comment",
					  "set_type" => "open"),
			   ),
        "texts" => array(
            "t1" => array("id" => "3",
                          "sigle" => "t1",
                          "fullname" => "test-dummy",
                          "project_id" => "1",
                          "created" => "2013-01-22 14:30:30",
                          "creator_id" => "3",
                          "changed" => "0000-00-00 00:00:00",
                          "changer_id" => "3",
                          "currentmod_id" => null
            ),
            "t1_reduced" => array("id" => "3",
                          "sigle" => "t1",
                          "fullname" => "test-dummy",
                          "project_id" => "1",
                          "currentmod_id" => null,
                          "header" => null,
            ),
            "t2" => array("id" => "4",
                          "sigle" => "t2",
                          "fullname" => "yet another dummy",
                          "project_id" => "1",
                          "created" => "2013-01-31 13:13:20",
                          "creator_id" => "1",
                          "changed" => "0000-00-00 00:00:00",
                          "changer_id" => "1",
                          "currentmod_id" => "14",
            ),
            "t2_reduced" => array("id" => "4",
                          "sigle" => "t2",
                          "fullname" => "yet another dummy",
                          "project_id" => "1",
                          "currentmod_id" => "14",
                          "header" => null,
            ),
            "t3" => array("id" => "5",
                          "sigle" => "t3",
                          "fullname" => "dummy without tokens",
                          "project_id" => "1",
                          "created" => "2013-01-31 13:13:20",
                          "creator_id" => "1",
                          "changed" => "0000-00-00 00:00:00",
                          "changer_id" => "1",
                          "currentmod_id" => null,
	    ),
            "t3_reduced" => array("id" => "5",
                          "sigle" => "t3",
                          "fullname" => "dummy without tokens",
                          "project_id" => "1",
                          "currentmod_id" => null,
                          "header" => null,
	    ),
	    "header_fullfile" => array("header" => null,
			  "fullfile" => null
	    )


        ),
        "texts_extended" => array(
            "t1" => array('project_name' => 'Default-Gruppe',
                          'opened' => 'bollmann',
                          'creator_name' => 'bollmann',
                          'changer_name' => 'bollmann'),
            "t2" => array('project_name' => 'Default-Gruppe',
                          'opened' => null,
                          'creator_name' => 'system',
                          'changer_name' => 'system'),
            "t3" => array('project_name' => 'Default-Gruppe',
                          'opened' => null,
                          'creator_name' => 'system',
                          'changer_name' => 'system')
        ),
        "lines" => array(
                       array('id' => '1',
                            'trans' => '*{A*4}n$helm%9',
                            'utf' => 'Anshelm\'',
                            'tok_id' => '1',
                            'full_trans' => '*{A*4}n$helm%9',
                            'suggestions' => array (
                                array ( 'pos' => 'VVFIN.3.Pl.Past.Konj',
                                        'score' => '0.97')
                            ),
                            'anno_pos' => 'VVFIN.3.Pl.Past.Konj',
			     'page_name' => '1',
			     'page_side' => 'r',
			     'col_name' => '',
			     'line_name' => '1'
                        ),
                        array('id'          => '2',
                            'trans'       => 'pi$t||',
                            'utf'         => 'pist',
                            'tok_id'      => '2',
                            'full_trans'  => 'pi$t||u||s',
                            'suggestions' => array(
                                array( 'pos' => 'PPOSAT.Fem.Nom.Sg',
                                       'score' => null)
                            ),
                            'anno_pos'    => "PPOSAT.Fem.Nom.Sg",
			     'page_name' => '1',
			     'page_side' => 'r',
			     'col_name' => '',
			     'line_name' => '2'
                        ),
                        array('id'          => '3',
                            'trans'       => 'u||',
                            'utf'         => 'u',
                            'tok_id'      => '2',
                            'full_trans'  => 'pi$t||u||s',
                            'suggestions' => array(array('pos' => 'VMINF',
                                                   'score' => null)),
                            'anno_pos' => 'VMINF',
			     'page_name' => '1',
			     'page_side' => 'r',
			     'col_name' => '',
			     'line_name' => '2',
                            'flag_general_error' => 1,
                            'flag_inflection' => 1
                        ),
                        array('id'          => '4',
                            'trans'       => 's',
                            'utf'         => 's',
                            'tok_id'      => '2',
                            'full_trans'  => 'pi$t||u||s',
                            'suggestions' => array(
                                array('pos' => 'VVFIN.3.Pl.Pres.Konj',
                                      'score' => null)
                            ),
                            'anno_pos'    => 'VVFIN.3.Pl.Pres.Konj',
			     'page_name' => '1',
			     'page_side' => 'r',
			     'col_name' => '',
			     'line_name' => '2'
                        ),
                        array('id'          => '5',
                            'trans'       => 'aller#lieb$tev',
                            'utf'         => 'allerliebstev',
                            'tok_id'      => '3',
                            'full_trans'  => 'aller#lieb$tev',
                            'suggestions' => array(),
                            'anno_pos'    => 'PDS.*.Gen.Pl',
                            'anno_lemma'  => 'lemma',
			    'anno_comment' => 'cora comment',
			     'page_name' => '1',
			     'page_side' => 'r',
			     'col_name' => '',
			     'line_name' => '3'
                        ),
                        array('id'          => '6',
                            'trans'       => 'vunf=tusent#vnd#vierhundert#vn-(=)sechzig',
                            'utf'         => 'vunftusentvndvierhundertvnsechzig',
                            'tok_id'      => '4',
                            'full_trans'  => "vunf=\ntusent#vnd#vierhundert#vn-(=)\nsechzig",
                            'suggestions' => array(),
                            'anno_norm'   => 'norm',
			     'page_name' => '1',
			     'page_side' => 'r',
			     'col_name' => '',
			     'line_name' => '3'
                        ),
                        array('id' => '7',
                            'trans' => 'kunnen',
                            'utf' => 'kunnen',
                            'tok_id' => '5',
                            'full_trans' => 'kunnen.(.)',
                            'suggestions' => Array (),
                            'anno_lemma' => 'deletedlemma',
			     'page_name' => '1',
			     'page_side' => 'r',
			     'col_name' => '',
			     'line_name' => '5',
                            'flag_general_error' => 1
                        ),
                        array('id' => '8',
                            'trans' => '.',
                            'utf' => '.',
                            'tok_id' => '5',
                            'full_trans' => 'kunnen.(.)',
                            'suggestions' => Array (),
			     'page_name' => '1',
			     'page_side' => 'r',
			     'col_name' => '',
			     'line_name' => '5',
                             'anno_pos' => 'PDS.Fem.Nom.Sg',
                        ),
                        array('id' => '9',
                            'trans' => '(.)',
                            'utf' => '.',
                            'tok_id' => '5',
                            'full_trans' => 'kunnen.(.)',
                            'suggestions' => Array (),
                            'anno_norm' => 'deletednorm',
			     'page_name' => '1',
			     'page_side' => 'r',
			     'col_name' => '',
			     'line_name' => '5'
                        )
        )
    );
}

/** Test data for XMLHandler
 * this is both the initial data for testExport() and
 * the expected data for testImport().
 */
function get_XMLHandler_expected() {
    return array(
        "moderns" => array(
                array(
                    'tags' => array(
                        array(
                            'source' => 'auto',
                            'selected' => 1,
                            'type' => 'pos',
                            'tag' => 'VVFIN.2.Sg.Pres.Ind',
                            'score' => '0.900'
                        ),
                        array(
                            'source' => 'auto',
                            'selected' => 0,
                            'type' => 'pos',
                            'tag' => 'ART.Def.Masc.Nom.Sg',
                            'score' => '0.047218'
                        ),
                        array(
                            'source' => 'auto',
                            'selected' => 0,
                            'type' => 'pos',
                            'tag' => 'ART.Indef.Neut.Akk.Sg',
                            'score' => '0.014275'
                        ),
                        array(
                            'source' => 'user',
                            'selected' => 1,
                            'type' => 'lemma',
                            'tag' => 'sollen',
                            'score' => null
                        ),
                        array(
                            'source' => 'user',
                            'selected' => 1,
                            'type' => 'norm',
                            'tag' => 'sollst',
                            'score' => null
                        )
                    ),
                    'xml_id' => 't1_m1',
                    'trans' => '$ol',
                    'ascii' => 'sol',
                    'utf' => 'ſol',
                    'parent_xml_id' => 't1',
                    'flags' => array(),
                    'chk' => false
                ),
                array(
                    'tags' => array(
                        array(
                            'source' => 'auto',
                            'selected' => 0,
                            'type' => 'pos',
                            'tag' => 'VVFIN.2.Sg.Pres.Ind',
                            'score' => '0.900'
                        ),
                        array(
                            'source' => 'auto',
                            'selected' => 0,
                            'type' => 'pos',
                            'tag' => 'ART.Def.Masc.Nom.Sg',
                            'score' => '0.047218'
                        ),
                        array(
                            'source' => 'auto',
                            'selected' => 0,
                            'type' => 'pos',
                            'tag' => 'ART.Indef.Neut.Akk.Sg',
                            'score' => '0.014275'
                        ),
                        array(
                            'source' => 'user',
                            'selected' => 1,
                            'type' => 'lemma',
                            'tag' => 'er/sie/es',
                            'score' => null
                        ),
                        array(
                            'source' => 'user',
                            'selected' => 1,
                            'type' => 'norm',
                            'tag' => 'du',
                            'score' => null
                        ),
                        array(
                            'source' => 'user',
                            'selected' => 1,
                            'type' => 'pos',
                            'tag' => 'PPER.2.Sg.*.Nom',
                            'score' => null
                        )
                    ),
                    'xml_id' => 't1_m2',
                    'trans' => 'tu',
                    'ascii' => 'tu',
                    'utf' => 'tu',
                    'parent_xml_id' => 't1',
                    'flags' => array(),
                    'chk' => false
                ),
                array(
                    'tags' => array(
                        array(
                            'source' => 'user',
                            'selected' => 1,
                            'type' => 'lemma',
                            'tag' => 'essen',
                            'score' => null
                        ),
                        array(
                            'source' => 'user',
                            'selected' => 1,
                            'type' => 'norm',
                            'tag' => 'gegessen',
                            'score' => null
                        ),
                        array(
                            'source' => 'user',
                            'selected' => 1,
                            'type' => 'pos',
                            'tag' => 'VVPP',
                            'score' => null
                        )
                    ),
                    'xml_id' => 't2_m1',
                    'trans' => 'ge#e$$en',
                    'ascii' => 'geessen',
                    'utf' => 'geeſſen',
                    'parent_xml_id' => 't2',
                    'flags' => array(),
                    'chk' => false
                ),
                array(
                    'tags' => array(
                        array(
                            'source' => 'user',
                            'selected' => 1,
                            'score' => null,
                            'type' => 'lemma',
                            'tag' => 'Anselm'
                        ),
                        array(
                            'source' => 'user',
                            'selected' => 1,
                            'type' => 'norm',
                            'tag' => 'Anselm',
                            'score' => null
                        ),
                        array(
                            'source' => 'user',
                            'selected' => 1,
                            'type' => 'pos',
                            'tag' => 'NE._._._',
                            'score' => null
                        )
                    ),
                    'xml_id' => 't3_m1',
                    'trans' => 'Anshelm',
                    'ascii' => 'Anshelm',
                    'utf' => 'Anshelm',
                    'parent_xml_id' => 't3',
                    'flags' => array(),
                    'chk' => false
                ),
                array(
                    'tags' => array(array(
                        'source' => 'user',
                        'selected' => 1,
                        'score' => null,
                        'type' => 'pos',
                        'tag' => '$.'
                    )),
                    'xml_id' => 't3_m2',
                    'trans' => '/',
                    'ascii' => '/',
                    'utf' => '/',
                    'parent_xml_id' => 't3',
                    'flags' => array(),
                    'chk' => false
                ),
                array(
                    'tags' => array(array(
                        'source' => 'user',
                        'selected' => 1,
                        'score' => null,
                        'type' => 'pos',
                        'tag' => '$.'
                    )),
                    'xml_id' => 't3_m3',
                    'trans' => '(.)',
                    'ascii' => '',
                    'utf' => '',
                    'parent_xml_id' => 't3',
                    'flags' => array(),
                    'chk' => false
                ),
        ),
        "tokens" => array(
                array("xml_id" => "t0",
                      "trans" => "",
                      "ordnr" => 1),
                array("xml_id" => "t1",
                      "trans" => '$ol|tu',
                      "ordnr" => 2),
                array("xml_id" => "t2",
                      "trans" => 'ge#e$$en',
                      "ordnr" => 3),
                array("xml_id" => "t3",
                      "trans" => 'Anshelm/(.)',
                      "ordnr" => 4)
        ),
        "dipls" => array(
                array(
                    'xml_id' => 't1_d1',
                    'trans' => '$ol|tu',
                    'utf' => 'ſoltu',
                    'parent_tok_xml_id' => 't1',
                    'parent_line_xml_id' => 'l1'
                ),
                array(
                    'xml_id' => 't2_d1',
                    'trans' => 'ge#',
                    'utf' => 'ge',
                    'parent_tok_xml_id' => 't2',
                    'parent_line_xml_id' => 'l1'
                ),
                array(
                    'xml_id' => 't2_d2',
                    'trans' => 'e$$en',
                    'utf' => 'eſſen',
                    'parent_tok_xml_id' => 't2',
                    'parent_line_xml_id' => 'l1'
                ),
                array(
                    'xml_id' => 't3_d1',
                    'trans' => 'Anshelm/',
                    'utf' => 'Anshelm/',
                    'parent_tok_xml_id' => 't3',
                    'parent_line_xml_id' => 'l2'
                )
        ),
        "lines" => array(
                array(
                    'xml_id' => 'l1',
                    'name' => '01',
                    'num' => 1,
                    'range' => array('t1_d1', 't2_d2'),
                    'parent_xml_id' => 'c1'
                ),
                array(
                    'xml_id' => 'l2',
                    'name' => '02',
                    'num' => 2,
                    'range' => array('t3_d1', 't3_d1'),
                    'parent_xml_id' => 'c1'
                )
        ),
        "columns" => array(
                array(
                    'xml_id' => 'c1',
                    'name' => '',
                    'num' => 1,
                    'range' => array('l1', 'l2'),
                    'parent_xml_id' => 'p1'
                )
        ),
        "pages" => array(
            array(
                'xml_id' => 'p1',
                'side' => 'v',
                'name' => '42',
                'num' => 1,
                'range' => array('c1', 'c1')
            )
        ),
        "shifttags" => array(
                array(
                    'type' => 'rub',
                    'type_letter' => 'R',
                    'range' => array('t1', 't2')
                ),
                array(
                    'type' => 'title',
                    'type_letter' => 'T',
                    'range' => array('t3', 't3')
                )
        ),
        "comments" => array(
            array(
                'parent_db_id' => null,
                'parent_xml_id' => 't1',
                'text' => "Hier grosser Tintenfleck",
                'type' => 'K'
            ),
            array(
                'parent_db_id' => null,
                'parent_xml_id' => 't2',
                'text' => 'Beispielemendation',
                'type' => 'E'
            )
        ),
        "header" => "Testdatei. Freier Text hier. Alles moegliche an Kram steht da drin - alles zwischen +H und @H",
        "options" => array(
                    'ext_id' => 'Test101',
                    'name' => 'cora-importtest.xml'
        )
    );
}

function get_XMLHandler_initial() {
    return array(
        "lines" => array(
                       array('id' => '1',
                            'trans' => '*{A*4}n$helm%9',
                            'utf' => 'Anshelm\'',
                            'tok_id' => '1',
                            'ext_id' => null,
                            'full_trans' => '*{A*4}n$helm%9',
                            'num' => '0',
                            'suggestions' => array (
                                array ( 'pos' => 'VVFIN.3.Pl.Past.Konj',
                                        'score' => '0.97')
                            ),
                            'anno_pos' => 'VVFIN.3.Pl.Past.Konj',
                        ),
                    ),
    );
}


/** Test data to initialize CoraDocument with
 *
 * 02/2013-03/2013 Florian Petran
 *
 * it's also used for CoraDocument Mock objects,
 * e.g. in DBInterface tests.
 *
 * 02/0217: Also as an example document to serialize for XMLHandler tests --MB
 *
 */
function get_CoraDocument_data() {
    return array(
        "metadata" => array(
                          "id" => 447,
                          "sigle" => 't1',
                          "name" => 'testdocument',
                          "project_id" => 1,
                          "currentmod_id" => 19,
                          "header" => "test\nheader\nfoo\n\tbar",
                          "idlist" => array(15, 16, 17, 18, 19, 20)
        ),
        "pages" => array( // page
                        array( "xml_id" => "p1",
                               "side" => 'v',
                               'range' => array('c1', 'c1'),
                               'name' => '42',
                               'num' => '1',
                               "db_id" => '3'
                           )
                    ),
        "columns" => array( // column
                        array('xml_id' => 'c1',
                              'range' => array('l1', 'l2'),
                              'name' => 'a',
                              'num' => '1',
                              'parent_db_id' => '3',
                              'db_id' => '4'
                        )
                    ),
        "lines" => array( // lines
                        array('xml_id' => 'l1', // 8
                              'name' => '01',
                              'num' => '1',
                              'parent_db_id' => '4',
                              'range' => array('t1_d1', 't2_d2'),
                              'db_id' => '8'
                        ),
                        array('xml_id' => 'l2', // 9
                              'name' => '02',
                              'num' => '2',
                              'parent_db_id' => '4',
                              'range' => array('t3_d1', 't3_d1'),
                              'db_id' => '9'
                        )
                    ),
        "tokens" => array( // tokens
                        // first token is always an empty dummy token!
                        array("db_id" => "1",
                              "xml_id" => '',
                              'ordnr' => 1,
                              'trans' => ''),
                        array("db_id" => "7",
                              "xml_id" => "t1",
                              'ordnr' => 2,
                              'trans' => '$ol|tu'),
                        array("db_id" => "8",
                              "xml_id" => "t2",
                              'ordnr' => 3,
                              'trans' => 'ge#e$$en'),
                        array("db_id" => "9",
                              "xml_id" => "t3",
                              'ordnr' => 4,
                              'trans' => "Anshelm/(.)")
                    ),
        "dipls" => array( // dipl
                        array("db_id" => "10",
                              "xml_id" => "t1_d1",
                              "parent_tok_xml_id" => "t1",
                              'parent_tok_db_id' => '7',
                              'parent_line_db_id' => '8',
                              'utf' => '',
                              'trans' => "\$ol|tu"),
                        array("db_id" => "11",
                              "xml_id" => "t2_d1",
                              "parent_tok_xml_id" => "t2",
                              'parent_tok_db_id' => '8',
                              'parent_line_db_id' => '8',
                              'utf' => '',
                              'trans' => "ge#"),
                        array("db_id" => "12",
                              "xml_id" => "t2_d2",
                              "parent_tok_xml_id" => "t2",
                              'parent_tok_db_id' => '8',
                              'parent_line_db_id' => '9',
                              'utf' => '',
                              'trans' => 'e$$en'),
                        array("db_id" => "13",
                              "xml_id" => "t3_d1",
                              "parent_tok_xml_id" => "t3",
                              'parent_tok_db_id' => '9',
                              'parent_line_db_id' => '9',
                              'utf' => '',
                              'trans' => "Anshelm/")
                   ),
        "mods" => array( // mod
                        array("db_id" => "15",
                              "xml_id" => "t1_m1",
                              "parent_xml_id" => "t1",
                              'tags' => array(
                                  array(
                                      'type' => 'pos',
                                      'tag' => 'VVFIN.2.Sg.Pres.Ind',
                                      'score' => '0.91',
                                      'source' => 'user',
                                      'selected' => '0'
                                  ),
                                  array(
                                      'type' => 'norm',
                                      'tag' => 'sollst',
                                      'score' => '1.0',
                                      'source' => 'user',
                                      'selected' => '1',
                                  ),
                                  array(
                                      'type' => 'lemma',
                                      'tag' => 'sollen',
                                      'source' => 'user',
                                      'score' => null,
                                      'selected' => '0'
                                  )
                              ),
                              'flags' => array(),
                              'parent_db_id' => '7',
                              'parent_tok_db_id' => '7',
                              'verified' => true,
                              'ascii' => '', // XXX
                              'utf' => '', // XXX
                              'trans' => '$ol'),
                        array("db_id" => "16",
                              "xml_id" => "t1_m2",
                              "parent_xml_id" => "t1",
                              'tags' => array(
                                  array(
                                      'type' => 'pos',
                                      'tag' => 'PPER.2.Sg.*.Nom',
                                      'score' => '0.91',
                                      'source' => 'user',
                                      'selected' => '0'
                                  ),
                                  array(
                                      'type' => 'norm',
                                      'tag' => 'du',
                                      'score' => '1.0',
                                      'source' => 'user',
                                      'selected' => '1',
                                  ),
                                  array(
                                      'type' => 'lemma',
                                      'tag' => 'du',
                                      'score' => null,
                                      'source' => 'user',
                                      'selected' => '0'
                                  ),
                                  array(
                                      'type' => 'comment',
                                      'tag' => 'Interessantes Phänomen hier',
                                      'score' => null,
                                      'source' => 'user',
                                      'selected' => '1'
                                  )
                              ),
                              'flags' => array("inflection"),
                              'parent_db_id' => '7',
                              'parent_tok_db_id' => '7',
                              'verified' => false,
                              'ascii' => '', // XXX
                              'utf' => '', // XXX
                              'trans' => 'tu'),
                        array("db_id" => "17",
                              "xml_id" => "t2_m1",
                              "parent_xml_id" => "t2",
                              'tags' => array(
                                  array(
                                      'type' => 'pos',
                                      'tag' => 'VVPP',
                                      'score' => '0.91',
                                      'source' => 'user',
                                      'selected' => '0'
                                  ),
                                  array(
                                      'type' => 'norm',
                                      'tag' => 'gegessen',
                                      'score' => '1.0',
                                      'source' => 'user',
                                      'selected' => '1',
                                  ),
                                  array(
                                      'type' => 'lemma',
                                      'tag' => 'essen',
                                      'score' => null,
                                      'source' => 'user',
                                      'selected' => '0'
                                  )
                              ),
                              'flags' => array(),
                              'parent_db_id' => '8',
                              'parent_tok_db_id' => '8',
                              'verified' => false,
                              'ascii' => '', // XXX
                              'utf' => '', // XXX
                              'trans' => 'ge#e$$en'),
                        array("db_id" => "18",
                              "xml_id" => "t3_m1",
                              "parent_xml_id" => "t3",
                              'tags' => array(
                                  array(
                                      'type' => 'pos',
                                      'tag' => 'NE.Masc.Nom.Sg',
                                      'score' => '0.91',
                                      'source' => 'user',
                                      'selected' => '0'
                                  ),
                                  array(
                                      'type' => 'norm',
                                      'tag' => 'Anselm',
                                      'score' => '1.0',
                                      'source' => 'user',
                                      'selected' => '1',
                                  ),
                                  array(
                                      'type' => 'lemma',
                                      'tag' => 'Anselm',
                                      'score' => null,
                                      'source' => 'user',
                                      'selected' => '0'
                                  )
                              ),
                              'flags' => array(),
                              'parent_db_id' => '9',
                              'parent_tok_db_id' => '9',
                              'verified' => false,
                              'ascii' => '', // XXX
                              'utf' => '', // XXX
                              'trans' => 'Anshelm'),
                        array("db_id" => "19",
                              "xml_id" => "t3_m2",
                              "parent_xml_id" => "t3",
                              'tags' => array(
                                  array(
                                      'type' => 'pos',
                                      'tag' => '$_',
                                      'score' => '0.91',
                                      'source' => 'user',
                                      'selected' => '0'
                                  ),
                                  array(
                                      'type' => 'norm',
                                      'tag' => '/',
                                      'score' => '1.0',
                                      'source' => 'user',
                                      'selected' => '1',
                                  ),
                                  array(
                                      'type' => 'lemma',
                                      'tag' => '/',
                                      'score' => null,
                                      'source' => 'user',
                                      'selected' => '0'
                                  )
                              ),
                              'flags' => array("general error"),
                              'parent_db_id' => '9',
                              'parent_tok_db_id' => '9',
                              'verified' => false,
                              'ascii' => '', // XXX
                              'utf' => '', // XXX
                              'trans' => '/'),
                        array("db_id" => "20",
                              "xml_id" => "t3_m3",
                              "parent_xml_id" => "t3",
                              'tags' => array(
                                  array(
                                      'type' => 'pos',
                                      'tag' => '$.',
                                      'score' => '0.91',
                                      'source' => 'user',
                                      'selected' => '0'
                                  ),
                                  array(
                                      'type' => 'norm',
                                      'tag' => '.',
                                      'score' => '1.0',
                                      'source' => 'user',
                                      'selected' => '1',
                                  ),
                                  array(
                                      'type' => 'lemma',
                                      'tag' => '.',
                                      'score' => null,
                                      'source' => 'user',
                                      'selected' => '0'
                                  )
                              ),
                              'flags' => array("general error", "inflection"),
                              'parent_db_id' => '9',
                              'parent_tok_db_id' => '9',
                              'verified' => false,
                              'ascii' => '', // XXX
                              'utf' => '', // XXX
                              'trans' => '(.)')
                ),
        "shifttags" => array(
                           array("type_letter" => "Ü",
                                 "db_range" => array(9, 9),
                                 "range" => array("t3", "t3")
                           )
                ),
        "comments" => array(
                          array("parent_db_id" => 8,
                                "parent_xml_id" => "t2",
                                "text" => "yay foo bar whoo",
                                "type" => 'K'
                          )
                ),
    );
}

/** Test data for automatic annotation
 *
 * 02/2014 Marcel Bollmann
 */
function get_AutomaticAnnotator_data() {
    $outfile = dirname(__FILE__) . "/tagger_output.txt";
    return array("all_moderns_simple" => array(
                                             array("id" => 801,
                                                   "ascii" => "vnd",
                                                   "verified" => 0,
                                                   "tags" => array("pos" => "DARTU",
                                                                   "norm" => "und")
                                                   ),
                                             array("id" => 802,
                                                   "ascii" => "er",
                                                   "verified" => 1,
                                                   "tags" => array("pos" => "PPER",
                                                                   "norm" => "er")
                                                   ),
                                             array("id" => 803,
                                                   "ascii" => "giebt",
                                                   "verified" => 0,
                                                   "tags" => array("pos" => "NE",
                                                                   "norm" => "giebel")
                                                   )
                                               ),

                 "taggerlist" => array('1' => array('name' => "Mock-Tagger",
                                                    'trainable' => true,
                                                    'class_name' => "RFTagger",
                                                    'display_name' => "My-Mock-Tagger",
                                                    "tagsets" => array("1","2"))
                                       ),
                 "tagsetlist" => array("ts1" => array("id" => '1',
                                                      "name" => "ImportTest",
                                                      "class" => "pos",
                                                      "set_type" => "closed"),
                                       "ts2" => array("id" => '2',
                                                      "name" => "NormTest",
                                                      "class" => "norm",
                                                      "set_type" => "open")
                                       ),
                 "tagger_options" => array("annotate" => "cat",
                                           "par" => $outfile),
                 "expected" => array(0 => array("id" => 801,
                                                "anno_pos" => "KOKOM",
                                                "ascii" => "vnd"),
                                     2 => array("id" => 803,
                                                "anno_pos" => "VVFIN",
                                                "ascii" => "giebt")
                                     )
                 );
}

function get_Exporter_data() {
    return array("all_tokens" => array(array(), // tokens
                                       array(), // dipls
                                       array(   // moderns
                                             array("parent_tok_db_id" => 701,
                                                   "db_id" => 801,
                                                   "trans" => "vnd",
                                                   "ascii" => "vnd",
                                                   "utf"   => "vnd",
                                                   "verified" => 1,
                                                   "tags" => array(
                                                                   array("tag" => "DARTU",
                                                                         "score" => 0.1,
                                                                         "selected" => 1,
                                                                         "source" => "auto",
                                                                         "type" => "pos"),
                                                                   array("tag" => "und",
                                                                         "score" => 0.1,
                                                                         "selected" => 1,
                                                                         "source" => "auto",
                                                                         "type" => "norm")
                                                                   ),
                                                   "flags" => array()
                                                   ),
                                             array("parent_tok_db_id" => 702,
                                                   "db_id" => 802,
                                                   "trans" => "jn",
                                                   "ascii" => "jn",
                                                   "utf"   => "jn",
                                                   "verified" => 0,
                                                   "tags" => array(
                                                                   array("tag" => "PPER",
                                                                         "score" => 0.8,
                                                                         "selected" => 1,
                                                                         "source" => "auto",
                                                                         "type" => "pos"),
                                                                   array("tag" => "ihn",
                                                                         "score" => 0.8,
                                                                         "selected" => 1,
                                                                         "source" => "user",
                                                                         "type" => "norm"),
                                                                   array("tag" => "ihnen",
                                                                         "score" => 0.8,
                                                                         "selected" => 1,
                                                                         "source" => "user",
                                                                         "type" => "norm_broad"),
                                                                   array("tag" => "f",
                                                                         "score" => 0.8,
                                                                         "selected" => 1,
                                                                         "source" => "user",
                                                                         "type" => "norm_type")
                                                                   ),
                                                   "flags" => array()
                                                   ),
                                             array("parent_tok_db_id" => 703,
                                                   "db_id" => 803,
                                                   "trans" => "gi\ebt",
                                                   "ascii" => "giebt",
                                                   "utf"   => "giēbt",
                                                   "verified" => 1,
                                                   "tags" => array(
                                                                   array("tag" => "NE",
                                                                         "score" => 0.5,
                                                                         "selected" => 1,
                                                                         "source" => "auto",
                                                                         "type" => "pos"),
                                                                   array("tag" => "VVIMP",
                                                                         "score" => 0.75,
                                                                         "selected" => 0,
                                                                         "source" => "auto",
                                                                         "type" => "pos"),
                                                                   array("tag" => "giebel",
                                                                         "score" => 0.8,
                                                                         "selected" => 1,
                                                                         "source" => "auto",
                                                                         "type" => "norm")
                                                                   ),
                                                   "flags" => array()
                                                   )
                                                )
                                       ),
                 "all_tok_43" => array(array(), // tokens
                                       array(), // dipls
                                       array(   // moderns
                                             array("parent_tok_db_id" => 721,
                                                   "db_id" => 821,
                                                   "ascii" => "eyns",
                                                   "verified" => 0,
                                                   "tags" => array(
                                                                   array("tag" => "CARD",
                                                                         "selected" => 1,
                                                                         "type" => "pos"),
                                                                   array("tag" => "eins",
                                                                         "selected" => 1,
                                                                         "type" => "norm")
                                                                   ),
                                                   "flags" => array()
                                                   ),
                                             array("parent_tok_db_id" => 722,
                                                   "db_id" => 822,
                                                   "ascii" => "zwey",
                                                   "verified" => 1,
                                                   "tags" => array(
                                                                   array("tag" => "CARD",
                                                                         "selected" => 1,
                                                                         "type" => "pos"),
                                                                   array("tag" => "zwei",
                                                                         "selected" => 1,
                                                                         "type" => "norm")
                                                                   ),
                                                   "flags" => array()
                                                   ),
                                             array("parent_tok_db_id" => 723,
                                                   "db_id" => 823,
                                                   "ascii" => "drey",
                                                   "verified" => 1,
                                                   "tags" => array(
                                                                   array("tag" => "CARD",
                                                                         "selected" => 1,
                                                                         "type" => "pos"),
                                                                   array("tag" => "drei",
                                                                         "selected" => 1,
                                                                         "type" => "norm")
                                                                   ),
                                                   "flags" => array()
                                                   ),
                                             array("parent_tok_db_id" => 724,
                                                   "db_id" => 824,
                                                   "ascii" => "vier",
                                                   "verified" => 1,
                                                   "tags" => array(
                                                                   array("tag" => "vier",
                                                                         "selected" => 1,
                                                                         "type" => "norm")
                                                                   ),
                                                   "flags" => array()
                                                   ),
                                             )
                                       ),
                 "expected_POS" => "vnd\tDARTU\njn\tPPER\ngiebt\tNE\n",
                 "expected_norm" => "vnd\tund\njn\tihn\tihnen\tf\ngiebt\tgiebel\n",
                 "expected_tagging_1" => "ascii\tpos\tnorm\nvnd\tDARTU\tund\n"
                                         ."jn\tPPER\tihn\ngiebt\tNE\tgiebel\n",
                 "expected_tagging_2" => "vnd\tund\njn\tihn\ngiebt\tgiebel\n",
                 "expected_training"  => "ascii\tpos\tnorm\nvnd\tDARTU\tund\n"
                                         ."\ngiebt\tNE\tgiebel\n"
                                         ."\nzwey\tCARD\tzwei\ndrey\tCARD\tdrei"
                                         ."\nvier\t\tvier\n"
                 );
}


?>
