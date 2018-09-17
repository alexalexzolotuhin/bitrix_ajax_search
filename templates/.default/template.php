<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>


<div class="section_s">
    <div class="container">
        <div class="skill-block col-sm-6">
            <h2>Professional Skills</h2>
            <div class="skill-info">
                <?foreach ($arResult["SKILLS"] as $key=>$skill):?>
                    <?if(!empty($skill)):?>
                        <p class="sect-caption"><?=$skill?> <span><?=$arResult["SKILLS_PER"][$key]?></span></p>
                        <div class="skill-stick"><span class="skill-size" style="width: <?=$arResult["SKILLS_PER"][$key]?>"></span></div>
                    <?endif;?>
                <?endforeach;?>
            </div>
        </div>
    </div>
    <div class="skill-image" style="background-image: url(<?=$arResult["FILE"];?>)"></div>
</div>
