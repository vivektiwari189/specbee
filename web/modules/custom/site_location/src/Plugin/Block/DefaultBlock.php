<?php

namespace Drupal\site_location\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'DefaultBlock' block.
 *
 * @Block(
 *  id = "default_block",
 *  admin_label = @Translation("Default block"),
 * )
 */
class DefaultBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
	  
	$config = \Drupal::getContainer()->get('config.factory')->getEditable('defaultform.adminsettings');  
    /*$build = [];
    $build['#theme'] = 'default_block';
    $build['default_block']['#markup'] = t('Current time in %city (%country) is %date.', ['%city' =>$config->get('city'),'%country' =>$config->get('country'),'%date' =>$config->get('date')]);
	$build['default_block']['#cache'] = array('tags' => [
            'config:defaultform.adminsettings'   
         ]);*/
	return [
    '#theme' => 'default_block',
    //'#current_time' => $this->ss->get_currenttime(),
    '#markup' => t('Current time in %city (%country) is %date.', ['%city' =>$config->get('city'),'%country' =>$config->get('country'),'%date' =>$config->get('date')]),
	'#country' => $config->get('country'),
    '#city' => $config->get('city'),
    '#date' => $config->get('date'),
    '#cache' => [
         'tags' => [
            'config:defaultform.adminsettings'   
         ],   
       ],
    ];

    //return $build;
  }

}
