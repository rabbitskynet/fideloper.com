<?php namespace Fideloper\Facades;

use ExpressiveDate;
use Illuminate\Database\Eloquent\Model;

class ViewHelper {

    public function relativeDate(Model $article)
    {
        return ExpressiveDate::make($article->created_at)->getRelativeDate();
    }

    public function daysOld(Model $article)
    {
        return ExpressiveDate::make($article->created_at)->getDifferenceInDays();
    }

    public function percOfYear(Model $article)
    {
        $perc = ceil((\ExpressiveDate::make($article->created_at)->getDifferenceInDays() / 365) * 100);

        if( $perc > 100 )
        {
            $perc = 100;
        }

        return $perc;
    }

    public function ageClass(Model $article)
    {
        $percOfYearOld = $this->percOfYear($article);

        // 0-33
        $ageClass = 'new';

        // 34-66
        if( $percOfYearOld > 33 && $percOfYearOld < 67 )
        {
            $ageClass = 'medium';
        }

        // 67+
        if( $percOfYearOld > 66 )
        {
            $ageClass = 'old';
        }

        return $ageClass;
    }

}