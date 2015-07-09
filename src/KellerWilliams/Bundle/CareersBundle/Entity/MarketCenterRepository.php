<?php

namespace KellerWilliams\Bundle\CareersBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\ResultSetMapping;

class MarketCenterRepository extends EntityRepository
{
    /**
     * @param $lat
     * @param $lng
     * @param int $radius
     *
     * @return array of market centers that match that criteria
     */
    public function findNearLatLng($lat, $lng, $radius = 60)
    {

        $em     = $this->getEntityManager();

        $sql    = "
            SELECT
                mc.id,
                mc.uid,
                mc.name,
                mc.lat,
                mc.lng,
                ((ACOS(Sin($lat * Pi() / 180) *
                    Sin(mc.lat  * Pi() / 180) +
                    Cos($lat    * Pi() / 180) *
                    Cos(mc.lat  * Pi() / 180) *
                    Cos(($lng - mc.lng) * Pi() / 180)) *
                    180 / Pi()) * 60 * 1.1515) AS `distance`
            FROM     `market_center` as mc
            HAVING   `distance` <= $radius
            ORDER BY `distance` ASC
        ";

        $query = $em->getConnection()->prepare($sql);
        $query->execute();
        return $query->fetchAll();

    }
}