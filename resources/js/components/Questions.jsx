import React, { useState, useEffect } from "react";
import Radio from "@mui/material/Radio";
import RadioGroup from "@mui/material/RadioGroup";
import FormControlLabel from "@mui/material/FormControlLabel";
import FormControl from "@mui/material/FormControl";
import FormLabel from "@mui/material/FormLabel";
import "./Questions.scss";
import { useFetcher } from "react-router-dom";

const Questions = ({
    pagination,
    prefix,
    totalPagination,
    totalQuestionsPerPage,
    questions,
    setQuestions,
    array,
}) => {
    const [answers, setAnswers] = useState([
        {
            id: 0,
            answer: "Nada",
            value: 0,
        },
        {
            id: 1,
            answer: "Poco",
            value: 1,
        },
        {
            id: 2,
            answer: "Mucho",
            value: 2,
        },
    ]);
    const handleClick = (e, id, value) => {
        e.preventDefault();

        setQuestions((prev) => {
            prev[array] = prev[array].map((item) => {
                if (item.id === id) {
                    item.answerSelected = value;
                    item.answerName = prefix + id;
                    item[prefix + id] = value;
                }
                return item;
            });

            return prev;
        });
    };

    return (
        questions && (
            <>
                {questions.map((item, idx) => {
                    if (
                        pagination == 1 &&
                        idx < pagination * totalQuestionsPerPage
                    ) {
                        return (
                            <Question
                                key={`q-${item.id}`}
                                item={item}
                                answers={answers}
                                handleClick={handleClick}
                                prefix={prefix}
                            />
                        );
                    } else if (
                        pagination > 1 &&
                        idx < (pagination + 1) * totalQuestionsPerPage &&
                        idx >= pagination * totalQuestionsPerPage
                    ) {
                        return (
                            <Question
                                key={`q-${item.id}`}
                                item={item}
                                answers={answers}
                                handleClick={handleClick}
                                prefix={prefix}
                            />
                        );
                    }
                })}
            </>
        )
    );
};

const Question = ({ handleClick, answers, prefix, item }) => {
    const [checked, setChecked] = useState(null);
    useEffect(() => {
        setChecked(item.answerSelected);
    }, [item]);
    const preHandleClick = (e, id, value) => {
        e.preventDefault();
        handleClick(e, id, value);
        setChecked(value);
    };

    return (
        <div className="question_container">
            <FormControl>
                <FormLabel id={`radio-label-${item.id}`}>
                    {item.pregunta}
                </FormLabel>
                <RadioGroup
                    aria-labelledby={`radio-label-${item.id}`}
                    name={`radio-${item.id}`}
                >
                    {answers.map((answer) => (
                        <FormControlLabel
                            key={answer.id}
                            checked={answer.id === checked}
                            value={answer.id}
                            name={`${prefix}-${item.id}`}
                            control={<Radio />}
                            label={answer.answer}
                            onClick={(e) =>
                                preHandleClick(e, item.id, answer.id)
                            }
                        />
                    ))}
                </RadioGroup>
            </FormControl>
        </div>
    );
};
export default Questions;
