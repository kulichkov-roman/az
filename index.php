<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Главная');
?>
    <div class="range-wrapper clearfix">
        <div class="re-block floatleft">
            <div class="re-col" for="range-data1"><span>Сумма:</span> <input type="text" id="range-data1" /> <span>руб.</span></div>
            <div class="range" id="range1"></div>
        </div>
        <div class="re-block floatleft">
            <div class="re-col" for="range-data2"><span>Срок:</span> <input type="text" id="range-data2" /> <span>дней</span></div>
            <div class="range" id="range2"></div>
        </div>
        <div class="re-block-select floatleft">
            <select>
                <option selected="selected">Способ получения</option>
                <option>На карту</option>
                <option>На счет в банке</option>
                <option>Доставка на дом</option>
            </select>
        </div>
        <div class="re-block floatleft">
            <button class="btn-site grey">Показать</button>
        </div>
    </div>
    <div class="result-wrapper">
        <div class="result-name-col clearfix">
            <div class="rn-col floatleft">Компания</div>
            <div class="rn-col floatleft">Ставка</div>
            <div class="rn-col floatleft">Сумма</div>
            <div class="rn-col floatleft">Срок</div>
            <div class="rn-col floatleft">Решение</div>
        </div>
        <div class="result-item clearfix">
            <div class="co-logo floatleft">
                <div class="img-logo">
                    <a href="#0">
                        <img src="/local/images/comp1.png" alt="" />
                    </a>
                </div>
            </div>
            <div class="co-data-wr clearfix floatleft">
                <div class="co-data floatleft">
                    <div class="mb-data-rn">Ставка</div>
                    <div class="co-data-cond">0.63%</div>
                    <div class="co-data-name">в день</div>
                </div>
                <div class="co-data floatleft">
                    <div class="mb-data-rn">Сумма</div>
                    <div class="co-data-cond">30 000</div>
                    <div class="co-data-name">руб.</div>
                </div>
                <div class="co-data floatleft">
                    <div class="mb-data-rn">Срок</div>
                    <div class="co-data-cond">125</div>
                    <div class="co-data-name">дней</div>
                </div>
                <div class="co-data floatleft">
                    <div class="mb-data-rn">Решение</div>
                    <div class="co-data-cond">30</div>
                    <div class="co-data-name">минут</div>
                </div>
            </div>
            <div class="co-data mbt-btn floatleft">
                <a href="#0" class="btn-site orange">Оформить</a>
            </div>
        </div>
        <div class="result-item clearfix">
            <div class="co-logo floatleft">
                <div class="img-logo">
                    <a href="#0">
                        <img src="/local/images/comp2.png" alt="" />
                    </a>
                </div>
            </div>
            <div class="co-data-wr clearfix floatleft">
                <div class="co-data floatleft">
                    <div class="mb-data-rn">Ставка</div>
                    <div class="co-data-cond">0.63%</div>
                    <div class="co-data-name">в день</div>
                </div>
                <div class="co-data floatleft">
                    <div class="mb-data-rn">Сумма</div>
                    <div class="co-data-cond">30 000</div>
                    <div class="co-data-name">руб.</div>
                </div>
                <div class="co-data floatleft">
                    <div class="mb-data-rn">Срок</div>
                    <div class="co-data-cond">125</div>
                    <div class="co-data-name">дней</div>
                </div>
                <div class="co-data floatleft">
                    <div class="mb-data-rn">Решение</div>
                    <div class="co-data-cond">30</div>
                    <div class="co-data-name">минут</div>
                </div>
            </div>
            <div class="co-data mbt-btn floatleft">
                <a href="#0" class="btn-site orange">Оформить</a>
            </div>
        </div>
        <div class="result-item clearfix">
            <div class="co-logo floatleft">
                <div class="img-logo">
                    <a href="#0">
                        <img src="/local/images/comp3.png" alt="" />
                    </a>
                </div>
            </div>
            <div class="co-data-wr clearfix floatleft">
                <div class="co-data floatleft">
                    <div class="mb-data-rn">Ставка</div>
                    <div class="co-data-cond">0.63%</div>
                    <div class="co-data-name">в день</div>
                </div>
                <div class="co-data floatleft">
                    <div class="mb-data-rn">Сумма</div>
                    <div class="co-data-cond">30 000</div>
                    <div class="co-data-name">руб.</div>
                </div>
                <div class="co-data floatleft">
                    <div class="mb-data-rn">Срок</div>
                    <div class="co-data-cond">125</div>
                    <div class="co-data-name">дней</div>
                </div>
                <div class="co-data floatleft">
                    <div class="mb-data-rn">Решение</div>
                    <div class="co-data-cond">30</div>
                    <div class="co-data-name">минут</div>
                </div>
            </div>
            <div class="co-data mbt-btn floatleft">
                <a href="#0" class="btn-site orange">Оформить</a>
            </div>
        </div>
        <div class="result-item clearfix">
            <div class="co-logo floatleft">
                <div class="img-logo">
                    <a href="#0">
                        <img src="/local/images/comp4.png" alt="" />
                    </a>
                </div>
            </div>
            <div class="co-data-wr clearfix floatleft">
                <div class="co-data floatleft">
                    <div class="mb-data-rn">Ставка</div>
                    <div class="co-data-cond">0.63%</div>
                    <div class="co-data-name">в день</div>
                </div>
                <div class="co-data floatleft">
                    <div class="mb-data-rn">Сумма</div>
                    <div class="co-data-cond">30 000</div>
                    <div class="co-data-name">руб.</div>
                </div>
                <div class="co-data floatleft">
                    <div class="mb-data-rn">Срок</div>
                    <div class="co-data-cond">125</div>
                    <div class="co-data-name">дней</div>
                </div>
                <div class="co-data floatleft">
                    <div class="mb-data-rn">Решение</div>
                    <div class="co-data-cond">30</div>
                    <div class="co-data-name">минут</div>
                </div>
            </div>
            <div class="co-data mbt-btn floatleft">
                <a href="#0" class="btn-site orange">Оформить</a>
            </div>
        </div>
        <div class="result-item clearfix">
            <div class="co-logo floatleft">
                <div class="img-logo">
                    <a href="#0">
                        <img src="/local/images/comp5.png" alt="" />
                    </a>
                </div>
            </div>
            <div class="co-data-wr clearfix floatleft">
                <div class="co-data floatleft">
                    <div class="mb-data-rn">Ставка</div>
                    <div class="co-data-cond">0.63%</div>
                    <div class="co-data-name">в день</div>
                </div>
                <div class="co-data floatleft">
                    <div class="mb-data-rn">Сумма</div>
                    <div class="co-data-cond">30 000</div>
                    <div class="co-data-name">руб.</div>
                </div>
                <div class="co-data floatleft">
                    <div class="mb-data-rn">Срок</div>
                    <div class="co-data-cond">125</div>
                    <div class="co-data-name">дней</div>
                </div>
                <div class="co-data floatleft">
                    <div class="mb-data-rn">Решение</div>
                    <div class="co-data-cond">30</div>
                    <div class="co-data-name">минут</div>
                </div>
            </div>
            <div class="co-data mbt-btn floatleft">
                <a href="#0" class="btn-site orange">Оформить</a>
            </div>
        </div>
        <div class="result-item clearfix">
            <div class="co-logo floatleft">
                <div class="img-logo">
                    <a href="#0">
                        <img src="/local/images/comp1.png" alt="" />
                    </a>
                </div>
            </div>
            <div class="co-data-wr clearfix floatleft">
                <div class="co-data floatleft">
                    <div class="mb-data-rn">Ставка</div>
                    <div class="co-data-cond">0.63%</div>
                    <div class="co-data-name">в день</div>
                </div>
                <div class="co-data floatleft">
                    <div class="mb-data-rn">Сумма</div>
                    <div class="co-data-cond">30 000</div>
                    <div class="co-data-name">руб.</div>
                </div>
                <div class="co-data floatleft">
                    <div class="mb-data-rn">Срок</div>
                    <div class="co-data-cond">125</div>
                    <div class="co-data-name">дней</div>
                </div>
                <div class="co-data floatleft">
                    <div class="mb-data-rn">Решение</div>
                    <div class="co-data-cond">30</div>
                    <div class="co-data-name">минут</div>
                </div>
            </div>
            <div class="co-data mbt-btn floatleft">
                <a href="#0" class="btn-site orange">Оформить</a>
            </div>
        </div>
        <div class="result-item clearfix">
            <div class="co-logo floatleft">
                <div class="img-logo">
                    <a href="#0">
                        <img src="/local/images/comp2.png" alt="" />
                    </a>
                </div>
            </div>
            <div class="co-data-wr clearfix floatleft">
                <div class="co-data floatleft">
                    <div class="mb-data-rn">Ставка</div>
                    <div class="co-data-cond">0.63%</div>
                    <div class="co-data-name">в день</div>
                </div>
                <div class="co-data floatleft">
                    <div class="mb-data-rn">Сумма</div>
                    <div class="co-data-cond">30 000</div>
                    <div class="co-data-name">руб.</div>
                </div>
                <div class="co-data floatleft">
                    <div class="mb-data-rn">Срок</div>
                    <div class="co-data-cond">125</div>
                    <div class="co-data-name">дней</div>
                </div>
                <div class="co-data floatleft">
                    <div class="mb-data-rn">Решение</div>
                    <div class="co-data-cond">30</div>
                    <div class="co-data-name">минут</div>
                </div>
            </div>
            <div class="co-data mbt-btn floatleft">
                <a href="#0" class="btn-site orange">Оформить</a>
            </div>
        </div>
    </div>
    <div class="content-text">
        <h2>Нужны деньги? Возьми займ до зарплаты</h2>
        <p>Как ни старались люди, собравшись в одно небольшое место несколько сот тысяч, изуродовать ту землю, на которой они жались, как ни забивали камнями землю, чтобы ничего не росло на ней, как ни счищали всякую пробивающуюся травку, как ни дымили каменным углем и нефтью, как ни обрезывали деревья и ни выгоняли всех животных и птиц, - весна была весною даже и в городе.</p>
        <p>Солнце грело, трава, оживая, росла и зеленела везде, где только не соскребли ее, не только на газонах бульваров, но и между плитами камней, и березы, тополи, черемуха распускали свои клейкие и пахучие листья, липы надували лопавшиеся почки; галки, воробьи и голуби по-весеннему радостно готовили уже гнезда, и мухи жужжали у стен, пригретые солнцем. Веселы были и растения, и птицы, и насекомые, и дети.</p>
        <p>Но люди - большие, взрослые люди - не переставали обманывать и мучать себя и друг друга. Люди считали, что священно и важно не это весеннее утро, не эта красота мира божия, данная для блага всех существ, - красота, располагающая к миру, согласию и любви, а священно и важно то, что они сами выдумали, чтобы властвовать друг над другом. Так, в конторе губернской тюрьмы считалось священным и важным не то, что всем животным и людям даны умиление и радость весны, а считалось священным и важным то, что накануне получена была за номером с печатью и заголовком бумага о том, чтобы к девяти часам утра были доставлены в нынешний день, 28-го апреля, три содержащиеся в тюрьме подследственные арестанта - две женщины и один мужчина. Одна из этих женщин, как самая важная преступница, должна была быть доставлена отдельно.</p>
        <p>Как ни старались люди, собравшись в одно небольшое место несколько сот тысяч, изуродовать ту землю, на которой они жались, как ни забивали камнями землю, чтобы ничего не росло на ней, как ни счищали всякую пробивающуюся травку, как ни дымили каменным углем и нефтью, как ни обрезывали деревья и ни выгоняли всех животных и птиц, - весна была весною даже и в городе.</p>
        <p>Солнце грело, трава, оживая, росла и зеленела везде, где только не соскребли ее, не только на газонах бульваров, но и между плитами камней, и березы, тополи, черемуха распускали свои клейкие и пахучие листья, липы надували лопавшиеся почки; галки, воробьи и голуби по-весеннему радостно готовили уже гнезда, и мухи жужжали у стен, пригретые солнцем. Веселы были и растения, и птицы, и насекомые, и дети.</p>
        <p>Но люди - большие, взрослые люди - не переставали обманывать и мучать себя и друг друга. Люди считали, что священно и важно не это весеннее утро, не эта красота мира божия, данная для блага всех существ, - красота, располагающая к миру, согласию и любви, а священно и важно то, что они сами выдумали, чтобы властвовать друг над другом. Так, в конторе губернской тюрьмы считалось священным и важным не то, что всем животным и людям даны умиление и радость весны, а считалось священным и важным то, что накануне получена была за номером с печатью и заголовком бумага о том, чтобы к девяти часам утра были доставлены в нынешний день, 28-го апреля, три содержащиеся в тюрьме подследственные арестанта - две женщины и один мужчина. Одна из этих женщин, как самая важная преступница, должна была быть доставлена отдельно.</p>
    </div>
<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>