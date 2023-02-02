                           <div class=" max-w-fit">
                                    <form method="get">
                                        <select name="filter">
                                            <option value="all">All Questions</option>
                                            <option value="solved">Marked as Solved</option>
                                            <option value="notsolved">Not Marked as Solved</option>
                                        </select>
                                        <input type="submit" value="Filter" class=" bg-[#4767C9]  text-white font-display text-xs rounded hover:bg-[#4767D9] px-4 py-1 ml-2 mb-1">
                                    </form>

                                    <?php
                                    $filter = isset($_GET['filter']) ? $_GET['filter'] : 'all';
                                
                                    if ($filter == 'solved') {
                                        $args['meta_query'] = array(
                                            array(
                                                'key' => 'close',
                                                'value' => 1,
                                                
                                            ),
                                        );
                                    } elseif ($filter == 'notsolved') {
                                        $args['meta_query'] = array(
                                            array(
                                                'key' => 'close',
                                                'compare' => 'NOT EXISTS',
                                            ),
                                        );
                                    }

                                    $lastBlog = new WP_Query($args);
                                    if ($lastBlog->have_posts()) {
                                        while ($lastBlog->have_posts()) {
                                            $lastBlog->the_post();
                                        }
                                        wp_reset_postdata();
                                    }
                                    ?>
                        </div>