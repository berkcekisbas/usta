<?php

namespace TanimlamalarBundle\Datatables;

use Sg\DatatablesBundle\Datatable\View\AbstractDatatableView;
use Sg\DatatablesBundle\Datatable\View\Style;
use Symfony\Component\HttpFoundation\Request;


/**
 * Class BirimDatatable
 *
 * @package TanimlamalarBundle\Datatables
 */
class BirimDatatable extends AbstractDatatableView
{
    /**
     * {@inheritdoc}
     */
    public function buildDatatable(array $options = array())
    {
        $this->topActions->set(array(
            'start_html' => '<div class="row"><div class="col-sm-3">',
            'end_html' => '<hr></div></div>',
            'actions' => array(
                array(
                    'route' => $this->router->generate('birim_yeni'),
                    'label' => "Yeni",
                    'icon' => 'glyphicon glyphicon-plus',
                    'attributes' => array(
                        'rel' => 'tooltip',
                        'title' => $this->translator->trans('datatables.actions.new'),
                        'class' => 'btn btn-primary',
                        'role' => 'button'
                    ),
                )
            )
        ));

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
            ->add('ad', 'column', array(
                'title' => 'Ad',
            ))
            ->add('kod', 'column', array(
                'title' => 'Kod',
            ))
            ->add('tip', 'column', array(
                'title' => 'Tip',
            ))
            ->add('fiyat', 'column', array(
                'title' => 'Fiyat',
            ))
            ->add('yeterlilik.ad', 'column', array(
                'title' => 'Yeterlilik Ad',
            ))
            ->add('durum', 'virtual', array(
                'title' => 'Durum'
            ))
            ->add('detay', 'virtual', array(
                'title' => 'Detay'
            ))
            ->add('teorik', 'virtual', array(
                'title' => 'Teorik Sorular'
            ))
            ->add('pratik', 'virtual', array(
                'title' => 'Pratik Sorular '
            ))
            ->add('islemler', 'virtual', array(
                'title' => 'İşlemler'
            ))


        ;
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

            $row['durum'] = '<a href="#" title="Pasif Yap" type="button" class="btn-xs btn-success">Aktif</a>';
            $row['detay'] = '<a href="#" type="button" class="btn-xs btn-info">Göster</a>';
            $row['teorik'] = '<a href="#" type="button" class="btn-xs btn-success">Sorular</a>';
            $row['pratik'] = '<a href="#" type="button" class="btn-xs btn-success">Sorular</a>';

            return $row;
        };

        return $formatter;
    }


    /**
     * {@inheritdoc}
     */
    public function getEntity()
    {
        return 'TanimlamalarBundle\Entity\Birim';
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'birim_datatable';
    }
}
