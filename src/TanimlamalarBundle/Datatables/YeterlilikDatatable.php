<?php

namespace TanimlamalarBundle\Datatables;

use Sg\DatatablesBundle\Datatable\View\AbstractDatatableView;
use Sg\DatatablesBundle\Datatable\View\Style;
use Symfony\Bundle\FrameworkBundle\Routing\Router;



/**
 * Class YeterlilikDatatable
 *
 * @package TanimlamalarBundle\Datatables
 */
class YeterlilikDatatable extends AbstractDatatableView
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

        $this->ajax->set(array(
            'url' => $this->router->generate('yeterlilik_results'),
            'type' => 'GET',
            'pipeline' => 0
        ));

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
                'title' => 'Id',
            ))
            ->add('kod', 'column', array(
                'title' => 'Kod',
            ))
            ->add('ad', 'column', array(
                'title' => 'Ad',
            ))

            ->add('detay', 'virtual', array(
                'title' => 'Detay'
            ))
            ->add('birim', 'virtual', array(
                'title' => 'Birim'
            ))
            ->add('durum', 'virtual', array(
                'title' => 'Durum'
            ))
            ->add('islemler', 'virtual', array(
                'title' => 'İşlemler'
            ));



    }

    public function getLineFormatter()
    {
        $formatter = function($row) {
            $row['islemler'] = '<div class="btn-group">
                                    <a class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" href="javascript:;"> İşlemler
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="guncelle/'.$row['id'].'"> Güncelle
                                            </a>
                                        </li>
                                        <li>
                                            <a class="font-red" href="sil/'.$row['id'].'"> Sil </a>
                                        </li>
                                    </ul>
                                </div>';

            $row['detay'] = '<a href="#" type="button" class="btn-xs btn-info">Detayları Göster</a>';
            $row['durum'] = '<a href="#" title="Pasif Yap" type="button" class="btn-xs btn-success">Aktif</a>';
            $row['birim'] = '<a href="'.$this->router->generate('birim_liste',array('yeterlilikid' => $row['id'])).'" title="Pasif Yap" type="button" class="btn-xs btn-info">Birimleri Göster</a>';



            return $row;
        };

        return $formatter;
    }

    /**
     * {@inheritdoc}
     */
    public function getEntity()
    {
        return 'TanimlamalarBundle\Entity\Yeterlilik';
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'yeterlilik_datatable';
    }
}
