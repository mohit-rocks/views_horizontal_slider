<?php

/**
 * @file
 * Contains \Drupal\views_horizontal_slider\Plugin\views\style\Owl.
 */

namespace Drupal\views_horizontal_slider\Plugin\views\style;

use Drupal\Core\Form\FormStateInterface;
use Drupal\views\Plugin\views\style\StylePluginBase;
/**
 * Style plugin to render each item into owl carousel.
 *
 * @ingroup views_style_plugins
 *
 * @ViewsStyle(
 *   id = "horizontal_slider",
 *   title = @Translation("Horizontal Slider"),
 *   help = @Translation("Displays rows as Horizontal Slider."),
 *   theme = "views_horizontal_slider_view",
 *   display_types = {"normal"}
 * )
 */
class Slider extends StylePluginBase {

  /**
   * Does the style plugin allows to use style plugins.
   *
   * @var bool
   */
  protected $usesRowPlugin = TRUE;

  /**
   * Does the style plugin support custom css class for the rows.
   *
   * @var bool
   */
  protected $usesRowClass = TRUE;

  /**
   * Set default options
   */
  protected function defineOptions() {
    $options = parent::defineOptions();

    $options['animate_in']  =  array('default' => 2);
    $options['animate_out'] =  array('default' => 2);
    $options['min_width']   = array('default' => 160);
    $options['max_width']   =  array('default' => 700);
    $options['activated_item']   =  array('default' => 2);
    $options['caption_field_name']   =  array('default' => '');
    $options['caption_field_fadein']   =  array('default' => 2);
    $options['caption_field_fadeout']   =  array('default' => 2);

    return $options;
  }

  /**
   * Render the given style.
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    parent::buildOptionsForm($form, $form_state);

    $form['animate_in'] = array(
      '#type' => 'number',
      '#title' => $this->t('Animate In'),
      '#required' => TRUE,
      '#description' => $this->t('Specify the Animation In Speed in seconds'),
      '#default_value' => $this->options['animate_in'],
    );

    $form['animate_out'] = array(
      '#type' => 'number',
      '#title' => $this->t('Animate Out'),
      '#required' => TRUE,
      '#description' => t('Specify the Animation Out Speed in seconds'),
      '#default_value' => $this->options['animate_out'],
    );

    $form['min_width'] = array(
      '#type' => 'number',
      '#title' => $this->t('Min Width'),
      '#required' => TRUE,
      '#description' => t('Minimum width of an image/item'),
      '#default_value' => $this->options['min_width'],
    );

    $form['max_width'] = array(
      '#type' => 'number',
      '#title' => $this->t('Max Width'),
      '#required' => TRUE,
      '#description' => t('Maximum width of an image/item'),
      '#default_value' => $this->options['max_width'],
    );

    $form['activated_item'] = array(
      '#type' => 'number',
      '#title' => $this->t('Active Item'),
      '#required' => FALSE,
      '#description' => t('The item that is active on page load. Start: 1 to the number of images/items you have. '),
      '#default_value' => $this->options['activated_item'],
    );

    $form['caption_field_name'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Caption field name'),
      '#required' => FALSE,
      '#description' => t('Name of the field that will be used as caption. You only need that if you want to fade in a caption on hover. You can get the field name out of the html code (for "example views-field-title"). Leave empty if not used.'),
      '#default_value' => $this->options['caption_field_name'],
    );

    $form['caption_field_fadein'] = array(
      '#type' => 'number',
      '#title' => $this->t('Caption field Fade in speed in seconds'),
      '#required' => FALSE,
      '#description' => t('Fade in speed '),
      '#default_value' => $this->options['caption_field_fadein'],
    );

    $form['caption_field_fadeout'] = array(
      '#type' => 'number',
      '#title' => $this->t('Caption field Fade out speed in seconds'),
      '#required' => FALSE,
      '#description' => t('Fade out speed '),
      '#default_value' => $this->options['caption_field_fadeout'],
    );
  }

}
