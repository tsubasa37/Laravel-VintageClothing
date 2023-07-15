<div>
    <select name="prefecture">
        <option value="">全国</option>
        <option value="北海道" @if (\Request::get('prefecture') == '北海道') selected @endif>北海道</option>
        <optgroup label="東北地方">
            <option value="青森" @if (\Request::get('prefecture') == '青森') selected @endif>青森</option>
            <option value="岩手" @if (\Request::get('prefecture') == '岩手') selected @endif>岩手</option>
            <option value="宮城" @if (\Request::get('prefecture') == '宮城') selected @endif>宮城</option>
            <option value="秋田" @if (\Request::get('prefecture') == '秋田') selected @endif>秋田</option>
            <option value="山形" @if (\Request::get('prefecture') == '山形') selected @endif>山形</option>
            <option value="福島" @if (\Request::get('prefecture') == '福島') selected @endif>福島</option>
        </optgroup>
        <optgroup label="関東地方">
            <option value="東京" @if (\Request::get('prefecture') == '東京') selected @endif>東京</option>
            <option value="埼玉" @if (\Request::get('prefecture') == '埼玉') selected @endif>埼玉</option>
            <option value="茨城" @if (\Request::get('prefecture') == '茨城') selected @endif>茨城</option>
            <option value="栃木" @if (\Request::get('prefecture') == '栃木') selected @endif>栃木</option>
            <option value="群馬" @if (\Request::get('prefecture') == '群馬') selected @endif>群馬</option>
            <option value="千葉" @if (\Request::get('prefecture') == '千葉') selected @endif>千葉</option>
            <option value="神奈川" @if (\Request::get('prefecture') == '神奈川') selected @endif>神奈川</option>
        </optgroup>
        <optgroup label="中部地方">
            <option value="新潟" @if (\Request::get('prefecture') == '新潟') selected @endif>新潟</option>
            <option value="山形" @if (\Request::get('prefecture') == '山形') selected @endif>山形</option>
            <option value="静岡" @if (\Request::get('prefecture') == '静岡') selected @endif>静岡</option>
            <option value="長野" @if (\Request::get('prefecture') == '長野') selected @endif>長野</option>
            <option value="岐阜" @if (\Request::get('prefecture') == '岐阜') selected @endif>岐阜</option>
            <option value="愛知" @if (\Request::get('prefecture') == '愛知') selected @endif>愛知</option>
            <option value="富山" @if (\Request::get('prefecture') == '富山') selected @endif>富山</option>
            <option value="石川" @if (\Request::get('prefecture') == '石川') selected @endif>石川</option>
            <option value="福井" @if (\Request::get('prefecture') == '福井') selected @endif>福井</option>
        </optgroup>
        <optgroup label="近畿地方">
            <option value="三重" @if (\Request::get('prefecture') == '三重') selected @endif>三重</option>
            <option value="滋賀" @if (\Request::get('prefecture') == '滋賀') selected @endif>滋賀</option>
            <option value="京都" @if (\Request::get('prefecture') == '京都') selected @endif>京都</option>
            <option value="大阪" @if (\Request::get('prefecture') == '大坂') selected @endif>大阪</option>
            <option value="兵庫" @if (\Request::get('prefecture') == '兵庫') selected @endif>兵庫</option>
            <option value="奈良" @if (\Request::get('prefecture') == '奈良') selected @endif>奈良</option>
            <option value="和歌山" @if (\Request::get('prefecture') == '和歌山') selected @endif>和歌山</option>
        </optgroup>
        <optgroup label="中国地方">
            <option value="鳥取" @if (\Request::get('prefecture') == '鳥取') selected @endif>鳥取</option>
            <option value="島根" @if (\Request::get('prefecture') == '島根') selected @endif>島根</option>
            <option value="岡山" @if (\Request::get('prefecture') == '岡山') selected @endif>岡山</option>
            <option value="広島" @if (\Request::get('prefecture') == '広島') selected @endif>広島</option>
            <option value="山口" @if (\Request::get('prefecture') == '山口') selected @endif>山口</option>
        </optgroup>
        <optgroup label="四国地方">
            <option value="香川" @if (\Request::get('prefecture') == '香川') selected @endif>香川</option>
            <option value="徳島" @if (\Request::get('prefecture') == '徳島') selected @endif>徳島</option>
            <option value="高知" @if (\Request::get('prefecture') == '高知') selected @endif>高知</option>
            <option value="愛媛" @if (\Request::get('prefecture') == '愛媛') selected @endif>愛媛</option>
        </optgroup>
        <optgroup label="九州地方">
            <option value="福岡" @if (\Request::get('prefecture') == '徳島') selected @endif>福岡</option>
            <option value="大分" @if (\Request::get('prefecture') == '大分') selected @endif>大分</option>
            <option value="佐賀" @if (\Request::get('prefecture') == '佐賀') selected @endif>佐賀</option>
            <option value="長崎" @if (\Request::get('prefecture') == '長崎') selected @endif>長崎</option>
            <option value="宮城" @if (\Request::get('prefecture') == '宮城') selected @endif>宮城</option>
            <option value="熊本" @if (\Request::get('prefecture') == '熊本') selected @endif>熊本</option>
            <option value="鹿児島" @if (\Request::get('prefecture') == '鹿児島') selected @endif>鹿児島</option>
            <option value="沖縄" @if (\Request::get('prefecture') == '沖縄') selected @endif>沖縄</option>
        </optgroup>
    </select>
    <input name="storeName" class=" border border-gray-500 py-2" placeholder="店舗名の入力">
    <button  class="ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">検索する</button>
</div>