import React, { useEffect, useState } from "react";

import ReactPaginate from "react-paginate";
import "./Paginate.scss";
// Example items, to simulate fetching from another resources.

const Items = ({ currentItems, setQuestions }) => {
    const handleClick = (e, id, value) => {
        console.log(e.target, id, value);
        setQuestions((prev) => {
            prev = prev.map((item) => {
                if (item.id === id) {
                    item.answerSelected = value;
                }
                return item;
            });
        });
    };
    return (
        <>
            {currentItems &&
                currentItems.map((item, idx) => (
                    <div className="container_question" key={idx}>
                        <h3>{item.question}</h3>
                        {/* answers options */}
                        <div className="row">
                            <div className="col-md-6">
                                <div className="form-check">
                                    {item.answers.map((answer) => (
                                        <div className="container_question__option">
                                            <label
                                                className="container_check"
                                                htmlFor={`flexRadioDefault${item.id}`}
                                            >
                                                {answer.answer}
                                                <input
                                                    type="radio"
                                                    checked="checked"
                                                    name={`flexRadioDefault${item.id}`}
                                                    onChange={(e) =>
                                                        handleClick(
                                                            e,
                                                            item.id,
                                                            answer.id
                                                        )
                                                    }
                                                    value={
                                                        answer.id ===
                                                        item.answerSelected
                                                    }
                                                    id={`flexRadioDefault${item.id}`}
                                                />

                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    ))}
                                </div>
                            </div>
                        </div>
                    </div>
                ))}
        </>
    );
};

function PaginatedItems({ itemsPerPage, data, setQuestions }) {
    // Here we use item offsets; we could also use page offsets
    // following the API or data you're working with.
    const [itemOffset, setItemOffset] = useState(0);
    const [items, setItems] = useState([]);
    useEffect(() => {
        setItems(data);
    }, [data]);

    // Simulate fetching items from another resources.
    // (This could be items from props; or items loaded in a local state
    // from an API endpoint with useEffect and useState)
    const endOffset = itemOffset + itemsPerPage;
    console.log(`Loading items from ${itemOffset} to ${endOffset}`);
    const currentItems = items.slice(itemOffset, endOffset);
    const pageCount = Math.ceil(items.length / itemsPerPage);

    // Invoke when user click to request another page.
    const handlePageClick = (event) => {
        const newOffset = (event.selected * itemsPerPage) % items.length;

        setItemOffset(newOffset);
    };

    return (
        <>
            <Items
                currentItems={currentItems}
                key="1"
                setQuestions={setQuestions}
            />
            <ReactPaginate
                breakLabel="..."
                nextLabel="Siguiete >"
                onPageChange={handlePageClick}
                pageRangeDisplayed={5}
                pageCount={pageCount}
                previousLabel="< Anterior"
                renderOnZeroPageCount={null}
            />
        </>
    );
}

export default PaginatedItems;
