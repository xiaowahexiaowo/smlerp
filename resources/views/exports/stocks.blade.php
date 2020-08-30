 <table class="table table-sm table-striped">
            <thead>
              <tr>

                 <th>机组编号</th> <th>产品类型</th> <th>机组类型</th> <th>功率</th> <th>相数</th> <th>单位</th> <th>初期库存</th> <th>入库数量</th> <th>出库数量</th> <th>库存数量</th> <th>库存单价</th> <th>库存金额</th> <th>备注说明</th>

              </tr>
                   <tr>

              <th>unit_no</th> <th>unit_type</th> <th>unit_model</th> <th>power</th> <th>phase</th> <th>unit</th> <th>init_stock</th> <th>warehousing_count</th> <th>out_count</th> <th>inventory_quantity</th> <th>unit_price</th> <th>total_price</th> <th>remark</th>

              </tr>
            </thead>

            <tbody>
              @foreach($stocks as $stock)
              <tr>


               <td>{{$stock->generating_unit_no}}</td><td>{{$stock->product_type}}</td> <td>{{$stock->generating_unit_type}}</td> <td>{{$stock->power}}</td> <td>{{$stock->phases_number}}</td> <td>{{$stock->unit}}</td> <td>{{$stock->init_stock}}</td> <td>{{$stock->warehousing_count}}</td> <td>{{$stock->out_count}}</td> <td>{{$stock->inventory_quantity}}</td> <td>{{$stock->warehousing_price}}</td> <td>{{$stock->stock_amount}}</td> <td>{{$stock->remark}}</td>


              </tr>
              @endforeach
            </tbody>
          </table>
