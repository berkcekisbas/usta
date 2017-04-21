<?php

namespace SorubankasiBundle\Datatables;

use Sg\DatatablesBundle\Datatable\View\AbstractDatatableView;
use Sg\DatatablesBundle\Datatable\View\Style;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class TeorikSoruDatatable
 *
 * @package SorubankasiBundle\Datatables
 */
class TeorikSoruDatatable extends AbstractDatatableView
{
    /**
     * {@inheritdoc}
     */
    public function buildDatatable(array $options = array())
    {



        $this->features->set(array(
            'auto_width' => true,
            'defer_render' => false,
            'info' => true,
            'jquery_ui' => false,
            'length_change' => true,
            'ordering' => true,
            'paging' => true,
            'processing' => true,
            'scroll_x' => false,
            'scroll_y' => '',
            'searching' => true,
            'state_save' => false,
            'delay' => 0,
            'extensions' => array(),
            'highlight' => false,
            'highlight_color' => 'red'
        ));

        /*
        $this->ajax->set(array(
            'url' => $this->router->generate('teoriksoru_results',array('birimid' => 'x')),
            'type' => 'GET',
            'pipeline' => 0
        ));
        */

        $this->options->set(array(
            'display_start' => 0,
            'defer_loading' => -1,
            'dom' => 'lfrtip',
            'length_menu' => array(10, 25, 50, 100),
            'order_classes' => true,
            'order' => array(array(0, 'asc')),
            'order_multi' => true,
            'page_length' => 10,
            'paging_type' => Style::FULL_NUMBERS_PAGINATION,
            'renderer' => '',
            'scroll_collapse' => false,
            'search_delay' => 0,
            'state_duration' => 7200,
            'stripe_classes' => array(),
            'class' => Style::BOOTSTRAP_3_STYLE,
            'individual_filtering' => false,
            'individual_filtering_position' => 'head',
            'use_integration_options' => true,
            'force_dom' => false,
            'row_id' => 'id'
        ));

        $this->columnBuilder
            ->add('id', 'column', array(
                'title' => 'id',
            ))
            ->add('yeterlilik', 'column', array(
                'title' => 'Yeterlilik',
            ))
            ->add('soru', 'column', array(
                'title' => 'Soru',
            ))
            ->add('zorlukderecesi', 'boolean', array(
                'title' => 'Zorlukderecesi',
            ))
            ->add('resim', 'column', array(
                'title' => 'Resim',
            ))
            ->add('birim.id', 'column', array(
                'title' => 'Birim id',
            ))
            ->add('birim.ad', 'column', array(
                'title' => 'Birim Ad',
            ))
            ->add('birim.kod', 'column', array(
                'title' => 'Birim Kod',
            ))
            ->add('birim.tip', 'column', array(
                'title' => 'Birim Tip',
            ))
            ->add('birim.yeterlilik.ad', 'column', array(
                'title' => 'Birim Fiyat ad ',
            ))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getEntity()
    {
        return 'SorubankasiBundle\Entity\TeorikSoru';
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'teoriksoru_datatable';
    }
}
