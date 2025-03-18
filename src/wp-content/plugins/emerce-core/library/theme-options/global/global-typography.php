<?php

 // Create a sub-tab
  CSF::createSection( $prefix, array(
    'parent' => 'global_style', // The slug id of the parent section
    'title'  => 'Global Typography',
    'fields' => array(
        array(
              'id'      => 'heading-one',
              'type'    => 'typography',
              'title'   => 'Heading One Typography',
              'unit' => 'rem',
              'text_align' => false,
              'output'  => 'h1,.h1',
              'default' => array(
                'color'       => '#402500',
                'font-family' => 'Inter',
                'font-size'   => '3.5',
                'line-height' => '4',
                'font-style' => '700',
                'unit'        => 'rem',
                'type'        => 'google',
              ),
            ),
            
            
            array(
              'id'      => 'heading-two',
              'type'    => 'typography',
              'title'   => 'Heading Two Typography',
              'unit' => 'rem',
              'text_align' => false,
              'output'  => 'h2,.h2',
              'default' => array(
                'color'       => '#402500',
                'font-family' => 'Inter',
                'font-size'   => '2.5',
                'line-height' => '3',
                'font-style' => '700',
                'unit'        => 'rem',
                'type'        => 'google',
              ),
            ),
            
            array(
              'id'      => 'heading-three',
              'type'    => 'typography',
              'title'   => 'Heading Three Typography',
              'unit' => 'rem',
              'text_align' => false,
              'output'  => 'h3,.h3',
              'default' => array(
                'color'       => '#402500',
                'font-family' => 'Inter',
                'font-size'   => '2',
                'line-height' => '2.5',
                'font-style' => '700',
                'unit'        => 'rem',
                'type'        => 'google',
              ),
            ),
            
             array(
              'id'      => 'heading-four',
              'type'    => 'typography',
              'title'   => 'Heading Four Typography',
              'unit' => 'rem',
              'text_align' => false,
              'output'  => 'h4,.h4',
              'default' => array(
                'color'       => '#402500',
                'font-family' => 'Inter',
                'font-size'   => '1.5',
                'line-height' => '2.25',
                'font-style' => '700',
                'unit'        => 'rem',
                'type'        => 'google',
              ),
            ),
            
             array(
              'id'      => 'heading-five',
              'type'    => 'typography',
              'title'   => 'Heading Five Typography',
              'unit' => 'rem',
              'text_align' => false,
              'output'  => 'h5,.h5',
              'default' => array(
                'color'       => '#402500',
                'font-family' => 'Inter',
                'font-size'   => '1.25',
                'line-height' => '1.875',
                'font-style' => '700',
                'unit'        => 'rem',
                'type'        => 'google',
              ),
            ),
            
             array(
              'id'      => 'heading-six',
              'type'    => 'typography',
              'title'   => 'Heading Six Typography',
              'unit' => 'rem',
              'text_align' => false,
              'output'  => 'h6,.h6',
              'default' => array(
                'color'       => '#402500',
                'font-family' => 'Inter',
                'font-size'   => '1.125',
                'line-height' => '1.75',
                'font-style' => '700',
                'unit'        => 'rem',
                'type'        => 'google',
              ),
            ),
            
             array(
              'id'      => 'paragraph_typo',
              'type'    => 'typography',
              'title'   => 'Body Typography',
              'unit' => 'rem',
              'text_align' => false,
              'color' => false,
              'output'  => 'body,p',
              'default' => array(
                'font-family' => 'Inter',
                'font-size'   => '1.1875',
                'line-height' => '1.75',
                'font-style' => '400',
                'unit'        => 'rem',
                'type'        => 'google',
              ),
            ),
            
            array(
              'id'      => 'alt_typo',
              'type'    => 'typography',
              'title'   => 'Alter Typography',
              'compact' => true,
            ),
            
        )
        ));